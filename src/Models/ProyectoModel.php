<?php
// Define el contenedor lógico (namespace) para organizar esta clase dentro de tu proyecto
namespace App\Models;

// Importa la clase de conexión a la base de datos
use App\Config\Database; 

// Importa la clase PDO nativa de PHP para interactuar con bases de datos de forma segura
use PDO;

class ProyectoModel
{
    // Declara una propiedad privada para almacenar la conexión activa
    private $conection;

    // El constructor se ejecuta automáticamente al hacer: new ProyectoModel()
    public function __construct()
    {
        // Crea una nueva instancia de la clase Database
        $db = new Database();
        // Llama al método de conexión y guarda el resultado (el objeto PDO) en nuestra propiedad
        $this->conection = $db->getConnection();
    }

    // Método para obtener todos los registros de la tabla
    public function getAll() 
    {
        // Define la consulta SQL (trae todo, ordenado por ID de forma descendente)
        $query = "SELECT * FROM proyectos ORDER BY id DESC";
        // Prepara la consulta para ejecución (esto previene inyecciones SQL)
        $stmt = $this->conection->prepare($query);
        // Ejecuta la consulta en el servidor de base de datos
        $stmt->execute();
        // Retorna todos los registros encontrados como un arreglo asociativo (clave-valor)
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar un nuevo proyecto
    public function create($nombre, $descripcion, $responsable)
    {
        // ¡OJO! La palabra "INFO" aquí causará un error. Elimínala para que sea: INSERT INTO proyectos...
        $query = "INSERT INTO INFO proyectos(nombre, descripcion, responsable)
        VALUES (:nombre, :descripcion, :responsable)";

        // Prepara la sentencia con marcadores de posición (:)
        $stmt = $this->conection->prepare($query);
        // Vincula los parámetros enviados a los marcadores de la consulta
        $stmt->bindParam(":nombre", $nombre); 
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":responsable", $responsable); 
        // Ejecuta la inserción y retorna true si fue exitosa
        return $stmt->execute();
    }

    // Método para eliminar un registro por su identificador único
    public function delete($id)
    {
       // Define la consulta de eliminación filtrada por ID
       $query = "DELETE FROM proyectos WHERE id = :id";
       // Prepara la consulta
       $stmt = $this->conection->prepare($query);
       // Vincula el ID recibido al marcador :id de forma segura
       $stmt->bindParam(":id", $id);
       // Ejecuta la eliminación y retorna true si fue exitosa
       return $stmt->execute();
    }
}
?>