<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class AlumnoCarrera {
    protected $table = "alumno_estudia_carrera"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Propiedades de la clase que coinciden con las columnas de la base de datos
    private $id;
    private $idAlumno;
    private $idCarrera;
    private $anio;
    private $datosCargados;
    private $mesaEspecial;
    private $fechaInscripcion;

    // Constructor
    public function __construct(
        $id = null,
        $idAlumno = null,
        $idCarrera = null,
        $anio = 2015,
        $datosCargados = 'N',
        $mesaEspecial = 'No',
        $fechaInscripcion = null
    ) {
        $this->id = $id;
        $this->idAlumno = $idAlumno;
        $this->idCarrera = $idCarrera;
        $this->anio = $anio;
        $this->datosCargados = $datosCargados;
        $this->mesaEspecial = $mesaEspecial;
        $this->fechaInscripcion = $fechaInscripcion;
        $this->getConection(); // Establece la conexión cuando se crea la instancia
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Métodos getters
    public function getId() {
        return $this->id;
    }

    public function getIdAlumno() {
        return $this->idAlumno;
    }

    public function getIdCarrera() {
        return $this->idCarrera;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getDatosCargados() {
        return $this->datosCargados;
    }

    public function getMesaEspecial() {
        return $this->mesaEspecial;
    }

    public function getFechaInscripcion() {
        return $this->fechaInscripcion;
    }

    // Métodos setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

    public function setIdCarrera($idCarrera) {
        $this->idCarrera = $idCarrera;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function setDatosCargados($datosCargados) {
        $this->datosCargados = $datosCargados;
    }

    public function setMesaEspecial($mesaEspecial) {
        $this->mesaEspecial = $mesaEspecial;
    }

    public function setFechaInscripcion($fechaInscripcion) {
        $this->fechaInscripcion = $fechaInscripcion;
    }

    // Método para obtener todos los registros
    public function fetchAllRecords() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }


    // Método para eliminar un registro
    public function borrarAlumnoEstudiaCarrera($id) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

?>
