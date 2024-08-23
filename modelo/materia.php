<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class Materia {
    protected $table = "materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Atributos de la clase ajustados a la nueva base de datos
    private $idPrimaria;
    private $nombre;
    private $anio;
    private $idCursado;
    private $carrera;
    private $promocionable;
    private $idFormato;
    private $idCarrera;

    // Constructor
    public function __construct(
        $idPrimaria = null,
        $nombre = null,
        $anio = null,
        $idCursado = null,
        $carrera = null,
        $promocionable = null,
        $idFormato = null,
        $idCarrera = null
    ) {
        $this->idPrimaria = $idPrimaria;
        $this->nombre = $nombre;
        $this->anio = $anio;
        $this->idCursado = $idCursado;
        $this->carrera = $carrera;
        $this->promocionable = $promocionable;
        $this->idFormato = $idFormato;
        $this->idCarrera = $idCarrera;
        $this->getConection(); // Establece la conexión a la base de datos
    }

    // Getters
    public function getIdPrimaria() {
        return $this->idPrimaria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getIdCursado() {
        return $this->idCursado;
    }

    public function getCarrera() {
        return $this->carrera;
    }

    public function getPromocionable() {
        return $this->promocionable;
    }

    public function getIdFormato() {
        return $this->idFormato;
    }

    public function getIdCarrera() {
        return $this->idCarrera;
    }

    // Setters
    public function setIdPrimaria($idPrimaria) {
        $this->idPrimaria = $idPrimaria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function setIdCursado($idCursado) {
        $this->idCursado = $idCursado;
    }

    public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }

    public function setPromocionable($promocionable) {
        $this->promocionable = $promocionable;
    }

    public function setIdFormato($idFormato) {
        $this->idFormato = $idFormato;
    }

    public function setIdCarrera($idCarrera) {
        $this->idCarrera = $idCarrera;
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }
    
    // Obtiene todos los registros de la tabla materia
    public function fetchMaterias() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
} // fin clase 


?>
