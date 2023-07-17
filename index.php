<?php

use App\Controllers\BooksController;

require 'vendor/autoload.php';


// 1. Instanciar (crear un objeto) la clase BooksController para acceder 
// a sus métodos
$booksController = new BooksController;

// 2. Ejecutar el método store() del controlador
/*$booksController -> store([
    "title" => "Matemáticas básicas",
    "author" => "Sara Poyo",
    "book_type" => "Académico",
    "price" => 0
]);*/
