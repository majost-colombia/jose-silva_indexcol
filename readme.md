Prueba Técnica para Indexcol
========================

Para correr la prueba solo sigue los siguientes pasos:
* **Clonar el repo
* **Ejecutar composer install (los parámetros dejarlos como están en .env.example)
* **Ejecutar php artisan migrate
* **Ejecutar php artisan migrate:refresh para reconstruir la base de datos
* **Ejecutar php artisan serve para correr el programa, ésto abrirá una ventana con la URL https://localhost:800 hay que asegurarse que el puerto esté disponible, de lo contrario iniciará en el 8001
