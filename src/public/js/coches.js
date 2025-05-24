const API_URL = '/api/coches';
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Función para obtener todos los coches y mostrarlos en la vista
async function obtenerCoches() {
    try {
        const respuesta = await fetch(API_URL, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            credentials: 'same-origin',
        });

        if (!respuesta.ok) {
            throw new Error(`Error: ${respuesta.status} ${respuesta.statusText}`);
        }

        const coches = await respuesta.json();
        mostrarCoches(coches);
    } catch (error) {
        console.error('Error al obtener los coches:', error);
        document.getElementById('coches-contenedor').innerHTML = '<p>Error al cargar los coches.</p>';
    }
    irAListado();
}

// Función para mostrar los coches en el contenedor
function mostrarCoches(coches) {
    const contenedor = document.getElementById('coches-contenedor');
    contenedor.innerHTML = `
        <div class="d-flex justify-content-center my-4">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Cargando coches...</span>
            </div>
        </div>
    `;

    if (coches.length === 0) {
        contenedor.innerHTML = '<p class="text-center">No hay coches disponibles.</p>';
        return;
    }

    const fila = document.createElement('div');
    fila.classList.add('row', 'g-3');

    coches.forEach(coche => {
        const columna = document.createElement('div');
        columna.classList.add('col-md-4');

        const carta = document.createElement('div');
        carta.classList.add('card', 'h-100', 'shadow-sm', 'position-relative');

        const cuerpo = document.createElement('div');
        cuerpo.classList.add('card-body');
        cuerpo.style.cursor = 'pointer';
        cuerpo.addEventListener('click', () => mostrarDetallesCoche(coche));

        // Mostrar marca y modelo
        const titulo = document.createElement('h5');
        titulo.classList.add('card-title');
        titulo.textContent = `${coche.marca} ${coche.modelo}`;

        // Mostrar matrícula
        const matricula = document.createElement('p');
        matricula.classList.add('card-text');
        matricula.textContent = `Matrícula: ${coche.matricula}`;

        // Icono de eliminar
        const iconoEliminar = document.createElement('i');
        iconoEliminar.classList.add('bi', 'bi-trash', 'text-danger', 'position-absolute');
        iconoEliminar.style.top = '0.5rem';
        iconoEliminar.style.right = '0.5rem';
        iconoEliminar.style.cursor = 'pointer';
        iconoEliminar.title = 'Eliminar coche';

        iconoEliminar.addEventListener('click', (e) => {
            e.stopPropagation();
            borrarCoche(coche.id);
        });

        cuerpo.appendChild(titulo);
        cuerpo.appendChild(matricula);
        carta.appendChild(cuerpo);
        carta.appendChild(iconoEliminar);
        columna.appendChild(carta);
        fila.appendChild(columna);
    });

    contenedor.innerHTML = '';
    contenedor.appendChild(fila);
}

// Función para mostrar los detalles de un coche en el formulario
function mostrarDetallesCoche(coche) {
    document.getElementById('coche-id').value = coche.id;
    document.getElementById('marca').value = coche.marca;
    document.getElementById('modelo').value = coche.modelo;
    document.getElementById('matricula').value = coche.matricula;
    irAProducto();
}

// Manejo de envío del formulario
const form = document.getElementById('coche-form');
if (form) {
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const id = document.getElementById('coche-id').value;
        const marca = document.getElementById('marca').value;
        const modelo = document.getElementById('modelo').value;
        const matricula = document.getElementById('matricula').value;

        const datos = { marca, modelo, matricula };

        try {
            const respuesta = await fetch(id ? `${API_URL}/${id}` : API_URL, {
                method: id ? 'PUT' : 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                credentials: 'same-origin',
                body: JSON.stringify(datos),
            });

            if (!respuesta.ok) {
                throw new Error(`Error: ${respuesta.status} ${respuesta.statusText}`);
            }

            const coche = await respuesta.json();
            console.log(id ? 'Coche actualizado:' : 'Coche creado:', coche);

            form.reset();
            document.getElementById('coche-id').value = '';
            obtenerCoches();
        } catch (error) {
            console.error('Error al guardar el coche:', error);
        }
    });
}

// Función para borrar un coche
async function borrarCoche(id) {
    if (!confirm('¿Estás seguro de que deseas eliminar este coche?')) return;

    try {
        const respuesta = await fetch(`${API_URL}/${id}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            credentials: 'same-origin',
        });

        if (!respuesta.ok) {
            throw new Error(`Error: ${respuesta.status} ${respuesta.statusText}`);
        }

        console.log(`Coche con ID ${id} eliminado.`);
        obtenerCoches();
    } catch (error) {
        console.error('Error al borrar el coche:', error);
    }
}

function irAProducto() {
    const seccion = document.getElementById('detalles-coche');
    if (seccion) {
        seccion.scrollIntoView({ behavior: 'smooth' });
    }
}

function irAListado() {
    const seccion = document.getElementById('coches-contenedor');
    if (seccion) {
        seccion.scrollIntoView({ behavior: 'smooth' });
    }
}

// Inicialización de la página
function init() {
    obtenerCoches();
    document.getElementById('limpiar-formulario').addEventListener('click', () => {
        const form = document.getElementById('coche-form');
        form.reset();
        document.getElementById('coche-id').value = '';
    });
}

document.addEventListener('DOMContentLoaded', init);

