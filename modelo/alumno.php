<?php
require_once "bd.php";
require_once "persona.php";

class Alumno extends Persona {
    protected $table = "alumno"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos
    protected $cantidad; // Cantidad de alumnos (si aplica)

    // Propiedades ajustadas a la nueva base de datos
    private $idPrimaria;
    private $dni;
    private $apellido;
    private $nombre;
    private $anioIngreso;
    private $debeTitulo;
    private $habilitado;
    private $idPersona;

    // Constructor ajustado
    public function __construct(
        $idPrimaria = null,
        $dni = null,
        $apellido = null,
        $nombre = null,
        $anioIngreso = null,
        $debeTitulo = null,
        $habilitado = null,
        $idPersona = null
    ) {
        $this->idPrimaria = $idPrimaria;
        $this->dni = $dni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->anioIngreso = $anioIngreso;
        $this->debeTitulo = $debeTitulo;
        $this->habilitado = $habilitado;
        $this->idPersona = $idPersona;
        $this->getConection(); // Establece la conexión a la base de datos
    }

    // Método para establecer la conexión a la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Getters y Setters ajustados
    public function getIdPrimaria() {
        return $this->idPrimaria;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getAnioIngreso() {
        return $this->anioIngreso;
    }

    public function getDebeTitulo() {
        return $this->debeTitulo;
    }

    public function getHabilitado() {
        return $this->habilitado;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPrimaria($idPrimaria) {
        $this->idPrimaria = $idPrimaria;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAnioIngreso($anioIngreso) {
        $this->anioIngreso = $anioIngreso;
    }

    public function setDebeTitulo($debeTitulo) {
        $this->debeTitulo = $debeTitulo;
    }

    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    // Métodos para obtener datos
    public function fetchAlumnosDataById($id) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM alumno INNER JOIN persona ON alumno.idPersona = persona.idPersona WHERE alumno.idalumno = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchAlumnosData() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM alumno INNER JOIN persona ON alumno.idPersona = persona.idPersona";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchAlumnos() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
} // Fin de la clase

?>








