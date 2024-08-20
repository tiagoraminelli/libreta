<?php
require_once "bd.php";
require_once "alumno.php";
class alumno_carrera{
    protected $table = "alumno_carrera"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos
    private $idAlumno;
    private $idCarrera;
    private $estado;

    // Constructor
    public function __construct($idAlumno = null, $idCarrera = null, $estado = null) {
        $this->idAlumno = $idAlumno;
        $this->idCarrera = $idCarrera;
        $this->estado = $estado;
    }

    // Getters
    public function getIdAlumno() {
        return $this->idAlumno;
    }

    public function getIdCarrera() {
        return $this->idCarrera;
    }

    public function getEstado() {
        return $this->estado;
    }

    // Setters
    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

    public function setIdCarrera($idCarrera) {
        $this->idCarrera = $idCarrera;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

        //conexion
        private function getConection() {
            $db = new Db(); // Crea un nuevo objeto de la clase Db
            $this->conection = $db->conection; // Asigna la conexión a la propiedad
        }
        
    // Método para mostrar todos los valores en pantalla
    public function fetchAlumnosInscriptos() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchAlumnosInscriptosData() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM `alumno_carrera`,alumno,carrera WHERE alumno_carrera.idalumno = alumno.idalumno AND alumno_carrera.idcarrera = carrera.idcarrera";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
}

// Ejemplo de uso
$alumnoCarrera = new alumno_carrera();
$datos = ($alumnoCarrera->fetchAlumnosInscriptosData());
echo "<pre>";
var_dump($datos);
echo "</pre>";
?>
