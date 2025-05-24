
Ejecutar las migraciones y seeding con los comandos:

```bash
php artisan migrate
php artisan db:seed
```

Se creará un usuario administador con las siguientes credenciales:

email: `admin@example.com`
password: `abc123.`

Se creará un usuario con el rol cliente:

email: `cliente@example.com`
password: `abc123.`

Se crearán tambien clientes aleatorios en la base de datos con la misma contraseña `abc123.`

Los nuevos usuarios que se registren con Breeze tendran rol cliente por defecto pero tendran que proporcionar una contraseña de 8 caracteres.