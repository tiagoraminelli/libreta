<<<<<<< HEAD
<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class Materia {
    protected $table = "materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Atributos de la clase
    private $materiaPrimaria;
    private $ano;
    private $codigo;
    private $descripcion;
    private $creditos;
    private $horarios;
    private $materiaCol;
    private $tipo;
    private $carrera_carreraIndice;

    // Constructor
    public function __construct(
        $materiaPrimaria = null,
        $ano = null,
        $codigo = null,
        $descripcion = null,
        $creditos = null,
        $horarios = null,
        $materiaCol = null,
        $tipo = null,
        $carrera_carreraIndice = null
    ) {
        $this->materiaPrimaria = $materiaPrimaria;
        $this->ano = $ano;
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->creditos = $creditos;
        $this->horarios = $horarios;
        $this->materiaCol = $materiaCol;
        $this->tipo = $tipo;
        $this->carrera_carreraIndice = $carrera_carreraIndice;
        $this->getConection(); // Establece la conexión a la base de datos
    }

    // Getters
    public function getMateriaPrimaria() {
        return $this->materiaPrimaria;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function getHorarios() {
        return $this->horarios;
    }

    public function getMateriaCol() {
        return $this->materiaCol;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCarreraCarreraIndice() {
        return $this->carrera_carreraIndice;
    }

    // Setters
    public function setMateriaPrimaria($materiaPrimaria) {
        $this->materiaPrimaria = $materiaPrimaria;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

    public function setHorarios($horarios) {
        $this->horarios = $horarios;
    }

    public function setMateriaCol($materiaCol) {
        $this->materiaCol = $materiaCol;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setCarreraCarreraIndice($carrera_carreraIndice) {
        $this->carrera_carreraIndice = $carrera_carreraIndice;
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

// Ejemplo de uso

?>
=======
<?php
require_once "bd.php"; // Asegúrate de que la clase Db esté correctamente implementada

class Materia {
    protected $table = "materia"; // Nombre de la tabla
    protected $conection; // Conexión a la base de datos

    // Atributos de la clase
    private $materiaPrimaria;
    private $ano;
    private $codigo;
    private $descripcion;
    private $creditos;
    private $horarios;
    private $materiaCol;
    private $tipo;
    private $carrera_carreraIndice;

    // Constructor
    public function __construct(
        $materiaPrimaria = null,
        $ano = null,
        $codigo = null,
        $descripcion = null,
        $creditos = null,
        $horarios = null,
        $materiaCol = null,
        $tipo = null,
        $carrera_carreraIndice = null
    ) {
        $this->materiaPrimaria = $materiaPrimaria;
        $this->ano = $ano;
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->creditos = $creditos;
        $this->horarios = $horarios;
        $this->materiaCol = $materiaCol;
        $this->tipo = $tipo;
        $this->carrera_carreraIndice = $carrera_carreraIndice;
        $this->getConection(); // Establece la conexión a la base de datos
    }

    // Getters
    public function getMateriaPrimaria() {
        return $this->materiaPrimaria;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function getHorarios() {
        return $this->horarios;
    }

    public function getMateriaCol() {
        return $this->materiaCol;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCarreraCarreraIndice() {
        return $this->carrera_carreraIndice;
    }

    // Setters
    public function setMateriaPrimaria($materiaPrimaria) {
        $this->materiaPrimaria = $materiaPrimaria;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

    public function setHorarios($horarios) {
        $this->horarios = $horarios;
    }

    public function setMateriaCol($materiaCol) {
        $this->materiaCol = $materiaCol;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setCarreraCarreraIndice($carrera_carreraIndice) {
        $this->carrera_carreraIndice = $carrera_carreraIndice;
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

// Ejemplo de uso
$materiaObj = new Materia();
$materias = $materiaObj->fetchMaterias(); // Obtén los datos de la base de datos

// Imprime los resultados
echo "<pre>";
var_dump($materias);
echo "</pre>";
?>
>>>>>>> libreta/main
