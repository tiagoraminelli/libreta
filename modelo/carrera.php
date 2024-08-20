<?php
require_once "bd.php";

class Carrera {
    protected $table = "carrera"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    private $carrera;
    private $descrip;

    // Constructor
    public function __construct($carrera = null, $descrip = null) {
        $this->carrera = $carrera;
        $this->descrip = $descrip;
        $this->getConection(); // Establece la conexión cuando se crea la instancia
    }

    // Getters
    public function getCarrera() {
        return $this->carrera;
    }

    public function getDescrip() {
        return $this->descrip;
    }

    // Setters
    public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }
    
    public function setDescrip($descrip) {
        $this->descrip = $descrip;
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }
    
    // Obtiene todos los registros de la tabla carrera
    public function getAllCarreras() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
} // fin clase 

// Ejemplo de uso

?>
