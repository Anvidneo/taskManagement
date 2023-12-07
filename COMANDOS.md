## Crer proyecto
composer create-project laravel/laravel crud

## Levantar el server
php artisan serve

## Editar .env con la config de DB
DB_DATABASE=crud

## Crear y correr migraciones
php artisan make:migration create_task_comments_table
php artisan migrate

## Crear modelos
php artisan make:model Persons -r (-r sirve para que cree el controlador)

## Crear controladores
php artisan make:controller Controller
