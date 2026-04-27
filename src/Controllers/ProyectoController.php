<?php
namespace App\Controllers;

use App\Models\ProyectoModel;

class ProyectoController
{
private $modelo;

public function __contruct()
{
$this->modelo = new ProyectoModel;
}

public function index()
{
    $proyectos = $this->modelo->getAll();
    require_once __DIR__ . '/../Views/Proyectos/index.php';
}

public function crear()
{
    require_once __DIR__ .  '/../Views/Proyectos/crear.php';
}

public function guardar()
{
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
       $nombre = $_POST['nombre'];
       $descripcion = $_POST['descripcion'];
       $responsable = $_POST['responsable'];
       $this->modelo->create($nombre, $descripcion, $responsable);
       header("Location: index.php?action=index");
    } 
}

public function eliminar()
{
    if(isset($_GET['id']))
        {
            $this->modelo->delete($_GET['id']);
            header("Location: index.php?action=index");
        }
}
}
?>