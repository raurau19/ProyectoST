<?php
// Define que esta clase pertenece al espacio de nombres (namespace) App\Controllers
namespace App\Controllers;

// Importa el modelo que ya creamos para poder usar sus funciones de base de datos
use App\Models\ProyectoModel;

class ProyectoController
{
    // Propiedad privada para guardar la instancia del modelo
    private $modelo;

    // Constructor: se ejecuta automáticamente al crear el controlador
    public function __construct()
    {
        // Instancia la clase ProyectoModel para tener acceso a los métodos de base de datos
        $this->modelo = new ProyectoModel;
    }

    // Acción para mostrar la lista de proyectos
    public function index()
    {
        // Pide al modelo que traiga todos los datos de la tabla proyectos
        $proyectos = $this->modelo->getAll();
        // Carga la vista (archivo HTML) para mostrar la información al usuario
        require_once __DIR__ . '/../Views/Proyectos/index.php';
    }

    // Acción para mostrar el formulario de creación
    public function crear()
    {
        // Simplemente carga la vista que contiene el formulario HTML
        require_once __DIR__ .  '/../Views/Proyectos/crear.php';
    }

    // Acción para procesar el formulario y guardar en la base de datos
    public function guardar()
    {
        // Verifica si los datos llegaron mediante el método POST (envío de formulario)
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           // Obtiene los valores enviados desde el formulario por su nombre
           $nombre = $_POST['nombre'];
           $descripcion = $_POST['descripcion'];
           $responsable = $_POST['responsable'];
           
           // Llama al modelo para insertar los datos en la base de datos
           $this->modelo->create($nombre, $descripcion, $responsable);
           
           // Redirige al usuario nuevamente a la lista de proyectos para ver el cambio
           header("Location: index.php?action=index");
        } 
    }

    // Acción para borrar un registro específico
    public function eliminar()
    {
        // Verifica que se haya enviado un ID a través de la URL (usando GET)
        if(isset($_GET['id']))
        {
            // Llama al modelo para eliminar el registro que coincida con ese ID
            $this->modelo->delete($_GET['id']);
            
            // Redirige al usuario a la lista para actualizar la vista
            header("Location: index.php?action=index");
        }
    }
}
?>