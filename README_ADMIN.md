
Ejecutar las migraciones y seeding con los comandos:

```bash
php artisan migrate
php artisan db:seed
```

Se creará un usuario con el rol taller:

email: `admin@example.com`
password: `abc123.`

Se creará un usuario con el rol cliente:

email: `cliente@example.com`
password: `abc123.`

Se crearán tambien clientes aleatorios en la base de datos con la contraseña `abc123.` y coches para los 3 primeros usuarios.