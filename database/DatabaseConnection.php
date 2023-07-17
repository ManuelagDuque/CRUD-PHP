<?php

class DatabaseConnection{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($servidor, $nombreUsuario, $contraseña, $baseDeDatos)
    {
        $this -> server = $servidor;
        $this -> username = $nombreUsuario;
        $this -> password = $contraseña;
        $this -> database = $baseDeDatos;
    }

    public function connect(){
        try{
            $this -> connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE,
                                                PDO::ERRMODE_EXCEPTION);
            $this -> connection -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $this -> connection->exec("SET NAMES 'utf8'");
        }catch(PDOException $e){
            echo "Problemas con la conexión".$e -> getMessage();
        }
    }

    public function get_connection(){
        return $this->connection;
    }
}
