<?php
require_once "bd.php";

class Carrera {
    protected $table = "carrera"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Propiedades de la clase que coinciden con las columnas de la base de datos
    private $idPrimaria;
    private $codigo;
    private $descripcion;
    private $descripcionCorta;
    private $habilitada;
    private $habilitacionRegistro;
    private $habilitacionCursado;
    private $imagen;

    // Constructor ajustado
    public function __construct(
        $idPrimaria = null,
        $codigo = null,
        $descripcion = null,
        $descripcionCorta = null,
        $habilitada = null,
        $habilitacionRegistro = null,
        $habilitacionCursado = null,
        $imagen = null
    ) {
        $this->idPrimaria = $idPrimaria;
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->descripcionCorta = $descripcionCorta;
        $this->habilitada = $habilitada;
        $this->habilitacionRegistro = $habilitacionRegistro;
        $this->habilitacionCursado = $habilitacionCursado;
        $this->imagen = $imagen;
        $this->getConection(); // Establece la conexión a la base de datos
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Getters y Setters ajustados para todas las propiedades
    public function getIdPrimaria() {
        return $this->idPrimaria;
    }

    public function setIdPrimaria($idPrimaria) {
        $this->idPrimaria = $idPrimaria;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcionCorta() {
        return $this->descripcionCorta;
    }

    public function setDescripcionCorta($descripcionCorta) {
        $this->descripcionCorta = $descripcionCorta;
    }

    public function getHabilitada() {
        return $this->habilitada;
    }

    public function setHabilitada($habilitada) {
        $this->habilitada = $habilitada;
    }

    public function getHabilitacionRegistro() {
        return $this->habilitacionRegistro;
    }

    public function setHabilitacionRegistro($habilitacionRegistro) {
        $this->habilitacionRegistro = $habilitacionRegistro;
    }

    public function getHabilitacionCursado() {
        return $this->habilitacionCursado;
    }

    public function setHabilitacionCursado($habilitacionCursado) {
        $this->habilitacionCursado = $habilitacionCursado;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    // Método para obtener todos los registros de la tabla carrera
    public function getAllCarreras() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }
} // Fin de la clase 

?>
