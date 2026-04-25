<?php
namespace App\Models;
use App\Config\Database; // Se importa la clase database del archivo Database.php 
use PDO;

class ProyectoModel
{
    private $conection;

    public function __construct()
    {
        $db = new Database();
        $this->conection = $db->getConnection();
    }
}
?>