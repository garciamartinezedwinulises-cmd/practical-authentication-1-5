# Sistema de Autenticacion Practico - Laravel

Este proyecto contiene el desarrollo de las practicas de la 1 a la 5 para la materia de desarrollo de la universidad, incluyendo control de acceso por roles (RBAC), validacion de formularios, carga de archivos adjuntos, automatizacion de datos con seeders y optimizacion de interfaces con paginacion.

## Requisitos previos

* XAMPP con PHP 8.2 o superior
* MySQL / phpMyAdmin
* Composer instalado en el sistema

## Instrucciones de instalacion

1. Clonar el repositorio en la carpeta local de htdocs o la ubicacion de desarrollo:
   git clone https://github.com/tu-usuario/tu-repositorio.git

2. Entrar a la carpeta del proyecto desde la terminal e instalar las dependencias de PHP:
   composer install

3. Copiar el archivo de entorno base para configurar la base de datos:
   cp .env.example .env

4. Generar la clave única de la aplicacion:
   php artisan key:generate

5. Ejecutar las migraciones junto con el llenado automatico de datos (Seeders):
   php artisan migrate --seed

6. Iniciar el servidor local de Laravel:
   php artisan serve

## Direcciones de comprobacion (URLs del proyecto)

Una vez que el servidor este corriendo en http://127.0.0.1:8000, se pueden validar las diferentes etapas del proyecto en las siguientes rutas:

* Practica 1 (Autenticacion base):
  Registro de nuevos usuarios: http://127.0.0.1:8000/register
  Inicio de sesion: http://127.0.0.1:8000/login

* Practica 2 (Control de acceso y roles):
  Panel administrativo protegido: http://127.0.0.1:8000/dashboard

* Practica 3 (Formulario con validacion y archivos):
  Creacion de publicaciones con archivos adjuntos: http://127.0.0.1:8000/posts/crear

* Practica 4 y 5 (Datos masivos y paginacion):
  Listado publico de publicaciones optimizado: http://127.0.0.1:8000/posts

## Pasos para crear un usuario administrador en phpMyAdmin

Para probar de manera correcta las rutas protegidas por roles como el dashboard, sigue estos pasos para otorgar permisos administrativos:

1. Entra al formulario de registro en http://127.0.0.1:8000/register y crea una cuenta de forma normal. Esto garantiza que la contraseña se encripte bajo los estandares de Laravel.
2. Abre phpMyAdmin en el navegador ingresando a http://localhost/phpmyadmin.
3. En la barra lateral izquierda selecciona la base de datos practica_breeze y abre la tabla llamada users.
4. En la pestaña Examinar, ubica el registro que acabas de crear y selecciona la opcion Editar.
5. Busca el campo encargado del rol (columna role) y cambia su valor actual por la palabra admin.
6. Guarda los cambios presionando el boton Continuar al final de la pagina.

Con esto el usuario contara con los accesos necesarios para ingresar al dashboard administrativo sin recibir el error de restriccion 403.