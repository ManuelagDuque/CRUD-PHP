<?php
namespace App\Controllers;

use Database\DatabaseConnection;
use Exception;

class BooksController{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct()
    {
        // Definir datos de conexión
        $this -> server = "localhost";
        $this -> username = "root";
        $this -> password = "dba";
        $this -> database = "books_store";

        // Conectar a DB
        $this -> connection = new DatabaseConnection($this->server, $this->username, $this->password,$this->database); 
        $this-> connection -> connect();
    }

    /**
     * STORE: guardar registros en la base de datos
     */
    function store($data){
        // Definir la Query de INSERT
        $query = "INSERT 
                  INTO books (title, author, book_type, price)
                  VALUES (?, ?, ?, ?)";
        
        // Preparar la query
        $stm = $this->connection -> get_connection()->prepare($query);

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

    /**
     * INDEX: Listar los registros de la base de dato
     */
    function index(){
        // Definir la Query de INSERT
        $query = "SELECT * FROM books";

        // Preparar la query
        $stm = $this->connection -> get_connection()->prepare($query);

        // Ejecutar la query
        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);

        if(!empty($results)){
            foreach($results as $result){
                echo $result['title']."<br>";
            }           
        }
        echo "No hay registros";
   
    }
}

