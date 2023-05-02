# CRUD Students

## Creación modelos y migraciones

```php artisan make:model Alumno -m```

Función nivel(). Indica que el modelo actual (el cual contiene este método) pertenece a una instancia del modelo Nivel. La relación se define a través de los argumentos que se le pasan al método belongsTo()

```php artisan make:model Nivel -m```
protected $table = 'niveles'; se utiliza en modelos de Eloquent de Laravel y permite establecer el nombre de la tabla de la base de datos correspondiente al modelo en cuestión.

```php artisan migrate```
Actualiza la base de datos con los cambios realizados en las migraciones.

## Creación Seeders

```php artisan make:seeder NivelSeeder```
En el método run() se define la lógica que se ejecutará al ejecutar el seeder. En este caso, se crean 3 instancias del modelo Nivel.
Después, se recorre el array de niveles y se crea una instancia del modelo Nivel por cada elemento del array.

```php artisan db:seed --class=NivelSeeder```
Ejecuta el seeder NivelSeeder y se insertan los datos en la tabla niveles.

## Controladores

```php artisan make:controller AlumnoController --model=Alumno --resource```
Crea un controlador llamado AlumnoController, con los métodos necesarios para realizar las operaciones CRUD sobre el modelo Alumno.
Al especificar la opción --model=Alumno, Artisan generará automáticamente un modelo llamado Alumno en el directorio app/Models si aún no existe.
La opción --resource indica que se deben generar los métodos de recursos para el controlador, lo que significa que se crearán los métodos index, create, store, show, edit, update y destroy, los cuales corresponden a las operaciones CRUD básicas que se pueden realizar sobre los recursos.

## Rutas

```Route::resource('/alumnos', AlumnoController::class);```
Crea las rutas necesarias para realizar todas las operaciones CRUD sobre el modelo Alumno.

## Vistas

Creación carpetas y archivos:

- views/layout/template.blade.php
- views/alumnos/index.blade.php

## Crear un nuevo registro alumno

1. AlumnoController.php. Se crea el método create() que devuelve la vista create.blade.php.
2. Archivo create.blade.php. Se crea un formulario para crear un nuevo registro de alumno.
3. En el formulario se ha usado old() para que los campos del formulario mantengan los valores introducidos por el usuario en caso de que haya algún error al enviar el formulario.
4. En el formulario se ha usado @csrf para incluir un token CSRF que protege la aplicación de ataques de falsificación de solicitudes entre sitios.
5. En la última parte del formulario, se añaden los niveles que se llaman desde el mismo método create() del controlador.

## Guardar datos del formulario en la base de datos 
https://www.youtube.com/watch?v=DtN98YOdnzQ&t=1060s (40.52)
