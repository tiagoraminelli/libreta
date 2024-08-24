<?php
require_once "bd.php";
require_once "alumno.php";

class AlumnoCarrera {
    protected $table = "alumno_cursa_materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Propiedades de la clase que coinciden con las columnas de la base de datos
    private $id;
    private $idAlumno;
    private $idMateria;
    private $idTipoCursadoAlumno;
    private $anioCursado;
    private $tipo;
    private $fechaHoraInscripcion;
    private $nota;
    private $estadoFinal;
    private $fechaModificacionNota;
    private $fechaVencimientoRegularidad;
    private $idUsuario;

    // Constructor
    public function __construct(
        $id = null,
        $idAlumno = null,
        $idMateria = null,
        $idTipoCursadoAlumno = 3,
        $anioCursado = null,
        $tipo = 'Presencial',
        $fechaHoraInscripcion = null,
        $nota = 0.00,
        $estadoFinal = null,
        $fechaModificacionNota = null,
        $fechaVencimientoRegularidad = null,
        $idUsuario = null
    ) {
        $this->id = $id;
        $this->idAlumno = $idAlumno;
        $this->idMateria = $idMateria;
        $this->idTipoCursadoAlumno = $idTipoCursadoAlumno;
        $this->anioCursado = $anioCursado;
        $this->tipo = $tipo;
        $this->fechaHoraInscripcion = $fechaHoraInscripcion;
        $this->nota = $nota;
        $this->estadoFinal = $estadoFinal;
        $this->fechaModificacionNota = $fechaModificacionNota;
        $this->fechaVencimientoRegularidad = $fechaVencimientoRegularidad;
        $this->idUsuario = $idUsuario;
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

    public function getIdTipoCursadoAlumno() {
        return $this->idTipoCursadoAlumno;
    }

    public function getAnioCursado() {
        return $this->anioCursado;
    }

    public function getTipo() {
        return $this->tipo;
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

    public function getFechaVencimientoRegularidad() {
        return $this->fechaVencimientoRegularidad;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
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

    public function setIdTipoCursadoAlumno($idTipoCursadoAlumno) {
        $this->idTipoCursadoAlumno = $idTipoCursadoAlumno;
    }

    public function setAnioCursado($anioCursado) {
        $this->anioCursado = $anioCursado;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
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

    public function setFechaVencimientoRegularidad($fechaVencimientoRegularidad) {
        $this->fechaVencimientoRegularidad = $fechaVencimientoRegularidad;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    // Método para mostrar todos los valores en pantalla
    public function fetchAlumnosInscriptos() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchAlumnosInscriptosAñoCursado($año) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT acm.id,
        acm.idAlumno, 
        a.dni, 
        acm.idMateria, 
        m.nombre,
        acm.idTipoCursadoAlumno, 
        acm.idUsuario,
        acm.anioCursado,
        acm.nota,
        acm.estado_final 
        FROM ".$this->table." 
        acm JOIN materia m ON m.id = acm.idMateria JOIN alumno a ON a.id = acm.idAlumno
        WHERE acm.anioCursado = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$año]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta

    }
    public function resultadosRinde($anioCursado,$dni) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT DISTINCT 
                CONCAT(alumno.nombre, ' ', alumno.apellido) AS nbcto,
                alumno_rinde_materia.condicion,
                alumno_rinde_materia.nota,
                materia.nombre 
            FROM 
                alumno_rinde_materia
                JOIN alumno_cursa_materia acm ON acm.idMateria = alumno_rinde_materia.idMateria
                JOIN materia ON materia.id = alumno_rinde_materia.idMateria
                JOIN alumno ON alumno.id = alumno_rinde_materia.idAlumno
            WHERE 
                acm.anioCursado = ? 
                AND alumno.dni = ?";
                    
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$anioCursado,$dni]); // Parametriza el año de cursado
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
    

    

}

// Ejemplo de uso
$alumnoCarrera = new AlumnoCarrera();
$datos = $alumnoCarrera->resultadosRinde(2024,46577675);
echo "<pre>";
var_dump($datos);
echo "</pre>";
?>
