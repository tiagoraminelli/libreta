<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class carreraMateria {
    protected $table = "carrera_tiene_materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Propiedades de la clase que coinciden con las columnas de la base de datos
    private $idPrimaria;
    private $idCarrera;
    private $idMateria;
    private $anio;
    private $ordenCarga;

    // Constructor para inicializar la clase con valores predeterminados
    public function __construct(
        $idPrimaria = null,
        $idCarrera = null,
        $idMateria = null,
        $anio = null,
        $ordenCarga = null
    ) {
        $this->idPrimaria = $idPrimaria;
        $this->idCarrera = $idCarrera;
        $this->idMateria = $idMateria;
        $this->anio = $anio;
        $this->ordenCarga = $ordenCarga;
        $this->getConection(); // Establece la conexión cuando se crea la instancia
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Métodos getters
    public function getIdPrimaria() {
        return $this->idPrimaria;
    }

    public function getIdCarrera() {
        return $this->idCarrera;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getOrdenCarga() {
        return $this->ordenCarga;
    }

    // Métodos setters
    public function setIdPrimaria($idPrimaria) {
        $this->idPrimaria = $idPrimaria;
    }

    public function setIdCarrera($idCarrera) {
        $this->idCarrera = $idCarrera;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function setOrdenCarga($ordenCarga) {
        $this->ordenCarga = $ordenCarga;
    }

    // Método para obtener todos los registros de la tabla cursar_materia
    public function fetchCursarMateria(){
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchDatosCompletosCarrera($id){
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT 
  ctm.*, 
  car.descripcion AS nombre_carrera, 
  mat.nombre AS nombre_materia,
  car.codigo as codigo,
  mat.anio as año,
  fmt.descripcion as descrip,
  cur.descripcion as tipo
FROM 
  carrera_tiene_materia AS ctm
JOIN 
  carrera AS car ON ctm.idCarrera = car.id
JOIN 
  materia AS mat ON ctm.idMateria = mat.id
JOIN 
 formato AS fmt ON fmt.id = mat.idFormato
 JOIN 
 cursado AS cur ON mat.idCursado = cur.id
WHERE 
  car.id = ?;
 ";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]); //[$id]
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

} // Fin de la clase


?>
