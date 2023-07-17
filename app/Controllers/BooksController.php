<?php
namespace App\Controllers;

use Database\DatabaseConnection;
use Exception;

class BooksController{

    /**
     * STORE: guardar registros en la base de datos
     */
    function store($data){
        // Definir datos de conexión
        $server = "localhost" ;
        $username = "root";
        $password = "dba";
        $database = "books_store";

        // Conectar a DB
        $connection = new DatabaseConnection($server, $username, $password,$database); 
        $connection -> connect();

        // Definir la Query de INSERT
        $query = "INSERT 
                  INTO books (title, author, book_type, price)
                  VALUES (?, ?, ?, ?)";
        
        // Preparar la query
        $stm = $connection -> get_connection()->prepare($query);

        // Ejecutar la query
        $results = $stm -> execute([$data['title'],
                                    $data['author'],
                                    $data['book_type'],
                                    $data['price'],
                                  ]);
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el libro '{$data['title']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
    }
}

