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

    public function getAll() // Obtener todo los datos
    {
        $query = "SELECT * FROM proyectos ORDER BY id DESC";
        $stmt = $this->conection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $descripcion, $responsable)
    {
        $query = "INSERT INTO INFO proyectos(nombre, descripcion, responsable)
        VALUES (:nombre, :descripcion, :responsable)";

        $stmt = $this->conection->prepare($query);
        $stmt->bindParam(":nombre", $nombre); 
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":responsable", $responsable); 
        return $stmt->execute();
    }

    public function delete($id)
    {
       $query = "DELETE FROM proyectos WHERE id = :id";
       $stmt = $this->conection->prepare($query);
       $stmt->bindParam(":id", $id);
       return $stmt->execute();
    }
}
?>