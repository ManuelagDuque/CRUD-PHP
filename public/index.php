<?php

use App\Controllers\BooksController;
use Router\RouterHandler;

require __DIR__ . '/../vendor/autoload.php';

// obtener la URL de la vista en la que estamos
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);
$resource = $slug[0] == "" ? "/": $slug[0];
$id = $slug[1] ?? null;

// instancia del Router
$router = new RouterHandler;

switch($resource){
    case '/':
        echo "Estas en la home";
        break;
    case "library":
        $method = $_POST["method"] ?? "get";
        $router -> set_method($method);
        $router -> set_data($_POST);
        $router -> route(BooksController::class, $id);
        break;
    case "customer":
        echo "Estas en el directorio de clientes";
        break;
    case "sales":
        echo "Estas en el inventario de ventas";
        break;
    default:
        echo "404 Not Found";
        break;
}




// 1. Instanciar (crear un objeto) la clase BooksController para acceder 
// a sus métodos
// $booksController = new BooksController;

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
// $booksController->show(3);


