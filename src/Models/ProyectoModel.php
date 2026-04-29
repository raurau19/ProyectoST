<?php
namespace App\Models;
use App\Config\Database;
use PDO;
class ProyectoModel {
private $conn;
public function __construct() {
$db = new Database();
$this->conn = $db->getConnection();
}
// Obtener todos los proyectos
public function getAll() {
$query = "SELECT * FROM proyectos ORDER BY id DESC";
$stmt = $this->conn->prepare($query);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Crear un nuevo proyecto
public function create($nombre, $descripcion, $responsable) {
$query = "INSERT INTO proyectos (nombre, descripcion, responsable) 
VALUES (:nombre, :descripcion, :responsable)";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":descripcion", $descripcion);
$stmt->bindParam(":responsable", $responsable);
return $stmt->execute();
}
// Eliminar un proyecto por su ID
public function delete($id) {
$query = "DELETE FROM proyectos WHERE id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(":id", $id);
return $stmt->execute();
}
}