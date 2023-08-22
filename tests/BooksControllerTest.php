<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\BooksController;

// TestCase es la clase padre que le hereda a BooksController
// todos sus atributos y métodos para que los use libremente

/**
 * Clase de test para los casos de uso de
 * la clase BooksController
 */
class BooksControllerTest extends TestCase {
    
    function test_store_book_is_ok(){
        /**
         * GIVEN/DADO que quiero almacenar un nuevo libro
         * WHEN/CUANDO le sea entregado un array con los 
         * siguientes datos:[title, author, book_type & price] 
         * al método Store
         * THEN/ENTONCES se recibe un mesanje de tipo string 
         * que indique "El libro fue registrado correctamente"
         */

         // 1. Arrange: preparar el escenario/entrada
         // Entrada
         $libro = [
            "title" => "La sombra del viento", 
            "author" => "Carlos Ruíz Zafón", 
            "book_type" => "Novela", 
            "price" => 30
         ];
         // Salida
         $expectedResponse = "El libro fue registrado correctamente"; 

         // 2. Act: ejecuta el escenario
         $booksController = new BooksController;
         $resultStore = $booksController -> store($libro); 

         // 3. Assert: valida que la salida del Act sea la esperada
         $this -> assertEquals($expectedResponse, $resultStore);
         $this -> assertIsString($resultStore);
    }

    function test_data_book_is_correct(){
        /**
         * GIVEN/DADO que quiero almacenar un nuevo libro
         * WHEN/CUANDO le sea entregado un array con los 
         * datos incorrectos:[name, author, book_type & price] 
         * al método Store
         * THEN/ENTONCES se recibe un mesanje de tipo string 
         * que indique "que los datos no son compatibles"
         */

         // 1. Arrange: preparar el escenario/entrada
         // Entrada
         $libro = [
            "name" => "el quijote", 
            "author" => "Miguel de Cervantes", 
            "book_type" => "Novela", 
            "price" => 40
         ];
         // Salida
         $expectedResponse = "Los datos no son compatible"; 

         // 2. Act: ejecuta el escenario
         $booksController = new BooksController;
         $resultStore = $booksController -> store($libro); 

         // 3. Assert: valida que la salida del Act sea la esperada
         $this -> assertEquals($expectedResponse, $resultStore);
         // $this -> assertIsString($resultStore);
    }

    function test_store_book_is_KO(){
        /**
         * GIVEN/DADO que quiero almacenar un nuevo libro
         * WHEN/CUANDO la base de datos falle
         * THEN/ENTONCES se recibe un mesanje de tipo string 
         * que indique "Ocurrio un error durante el registro de la base de datos"
         */

         // 1. Arrange: preparar el escenario/entrada
         // Entrada
         $libro = [
            "title" => "el quijote", 
            "author" => "Miguel de Cervantes", 
            "book_type" => "Novela", 
            "price" => 40
         ];
         // Salida
         $expectedResponse = "Ocurrio un error durante el registro de la base de datos"; 

         // 2. Act: ejecuta el escenario
         $booksController = new BooksController;
         $resultStore = $booksController -> store($libro); 

         // 3. Assert: valida que la salida del Act sea la esperada
         $this -> assertEquals($expectedResponse, $resultStore);
         // $this -> assertIsString($resultStore);
    }
}