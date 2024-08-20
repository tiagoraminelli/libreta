<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada
class CursarMateria {
    protected $table = "cursar_materia";
    private $alumno_persona_idpersona;
    private $materia_nombre;
    private $estado;
    private $fecha_inscripcion;
    private $nota;
    private $comentarios;
    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }
    // Constructor para inicializar la clase con valores predeterminados
    public function __construct($alumno_persona_idpersona = null, $materia_nombre = null, $estado = null, $fecha_inscripcion = null, $nota = null, $comentarios = null) {
        $this->alumno_persona_idpersona = $alumno_persona_idpersona;
        $this->materia_nombre = $materia_nombre;
        $this->estado = $estado;
        $this->fecha_inscripcion = $fecha_inscripcion;
        $this->nota = $nota;
        $this->comentarios = $comentarios;
    }

    // Métodos getters
    public function getAlumnoPersonaIdpersona() {
        return $this->alumno_persona_idpersona;
    }

    public function getMateriaNombre() {
        return $this->materia_nombre;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFechaInscripcion() {
        return $this->fecha_inscripcion;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getComentarios() {
        return $this->comentarios;
    }

    // Métodos setters
    public function setAlumnoPersonaIdpersona($alumno_persona_idpersona) {
        $this->alumno_persona_idpersona = $alumno_persona_idpersona;
    }

    public function setMateriaNombre($materia_nombre) {
        $this->materia_nombre = $materia_nombre;
    }

    public function setEstado($estado) {
        if (in_array($estado, ['pendiente', 'inactivo', 'activo'])) {
            $this->estado = $estado;
        } else {
            throw new InvalidArgumentException("Estado inválido.");
        }
    }

    public function setFechaInscripcion($fecha_inscripcion) {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }

    public function setNota($nota) {
        if (is_int($nota)) {
            $this->nota = $nota;
        } else {
            throw new InvalidArgumentException("Nota debe ser un entero.");
        }
    }

    public function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }

    public function fetchCursarMateria(){
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

} //fin de la clase.

// Crear una instancia de CursarMateria
$cursarMateria = new CursarMateria();
$cM = $cursarMateria->fetchCursarMateria();
var_dump($cM);


?>
