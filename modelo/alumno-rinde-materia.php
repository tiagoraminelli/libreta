<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class AlumnoRindeMateria {
    protected $table = "alumno_rinde_materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Propiedades de la clase que coinciden con las columnas de la base de datos
    private $id;
    private $idAlumno;
    private $idMateria;
    private $idCalendario;
    private $llamado;
    private $condicion;
    private $fechaHoraInscripcion;
    private $nota;
    private $estadoFinal;
    private $fechaModificacionNota;
    private $idUsuario;
    private $tipoInscripcion;

    // Constructor
    public function __construct(
        $id = null,
        $idAlumno = null,
        $idMateria = null,
        $idCalendario = 1,
        $llamado = null,
        $condicion = 'Regular',
        $fechaHoraInscripcion = null,
        $nota = 0.00,
        $estadoFinal = null,
        $fechaModificacionNota = null,
        $idUsuario = null,
        $tipoInscripcion = null
    ) {
        $this->id = $id;
        $this->idAlumno = $idAlumno;
        $this->idMateria = $idMateria;
        $this->idCalendario = $idCalendario;
        $this->llamado = $llamado;
        $this->condicion = $condicion;
        $this->fechaHoraInscripcion = $fechaHoraInscripcion;
        $this->nota = $nota;
        $this->estadoFinal = $estadoFinal;
        $this->fechaModificacionNota = $fechaModificacionNota;
        $this->idUsuario = $idUsuario;
        $this->tipoInscripcion = $tipoInscripcion;
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

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function getIdCalendario() {
        return $this->idCalendario;
    }

    public function getLlamado() {
        return $this->llamado;
    }

    public function getCondicion() {
        return $this->condicion;
    }

    public function getFechaHoraInscripcion() {
        return $this->fechaHoraInscripcion;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getEstadoFinal() {
        return $this->estadoFinal;
    }

    public function getFechaModificacionNota() {
        return $this->fechaModificacionNota;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getTipoInscripcion() {
        return $this->tipoInscripcion;
    }

    // Métodos setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function setIdCalendario($idCalendario) {
        $this->idCalendario = $idCalendario;
    }

    public function setLlamado($llamado) {
        $this->llamado = $llamado;
    }

    public function setCondicion($condicion) {
        $this->condicion = $condicion;
    }

    public function setFechaHoraInscripcion($fechaHoraInscripcion) {
        $this->fechaHoraInscripcion = $fechaHoraInscripcion;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function setEstadoFinal($estadoFinal) {
        $this->estadoFinal = $estadoFinal;
    }

    public function setFechaModificacionNota($fechaModificacionNota) {
        $this->fechaModificacionNota = $fechaModificacionNota;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setTipoInscripcion($tipoInscripcion) {
        $this->tipoInscripcion = $tipoInscripcion;
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
    public function deleteRecord($id) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

// Ejemplo de uso
$alumnoRindeMateria = new AlumnoRindeMateria();
$registros = $alumnoRindeMateria->fetchAllRecords();
echo "<pre>";
var_dump($registros);
echo "</pre>";
?>
