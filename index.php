<?php

use App\Controllers\BooksController;

require 'vendor/autoload.php';


// 1. Instanciar (crear un objeto) la clase BooksController para acceder 
// a sus métodos
$booksController = new BooksController;

// 2. Ejecutar el método store() del controlador
/*$booksController -> store([
    "title" => "El Principito",
    "author" => "Antonie de Saint Exuperry",
    "book_type" => "Cuentos",
    "price" => 30
]);*/

// 3. Ejecutar el método index() del controlador
// $booksController -> index();

// 4. Ejecutar el método show() del controlador
$booksController->show(3);
