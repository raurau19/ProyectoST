<?php
 namespace App\Config; // Nombre unico para los archivos php

 use PDO; // Herramienta para comunicarme con la base de datos
 use PDOException; // Herramienta para monitorear errores de conexion

 class Database // Clase gestion de conexiones
 {
 private $host = "localhost";
 public $dbname = "proyectost";
 private $user = "root";
 private $pass = "";

 public $conection; // Su proposito es ser usada como enlace a la base de datos en otros archivos

 public function getConnection() // Al ser publica permite que otros archivos accedan a esta funcion
 {
    $this->conection = null;

    try 
    {
     $this->conection = new PDO("mysql: host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
     $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
     echo "Error de conexion: " . $e->getMessage();
    }
    return $this->conection;
 }
 }
?>