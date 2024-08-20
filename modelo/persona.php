<<<<<<< HEAD
<?php
require_once "bd.php";

class Persona {
    protected $table = "persona"; // Nombre de la tabla en la base de datos
    protected $conection; // Objeto de conexión a la base de datos

    private $idpersona;
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    // Constructor
    public function __construct($idpersona = "", $nombre = "", $apellido = "", $dni = "", $telefono = "") {
        $this->idpersona = $idpersona;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->getConection(); // Establece la conexión cuando se crea la instancia
    }

    // Getter y Setter
    public function getId() {
        return $this->idpersona;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setId($idpersona) {
        $this->idpersona = $idpersona;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Obtiene todos los registros de la tabla persona
    public function getPersonas() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }



}

?>
=======
<?php
require_once "bd.php";

class Persona {
    protected $table = "persona"; // Nombre de la tabla en la base de datos
    protected $conection; // Objeto de conexión a la base de datos

    private $idpersona;
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    // Constructor
    public function __construct($idpersona = "", $nombre = "", $apellido = "", $dni = "", $telefono = "") {
        $this->idpersona = $idpersona;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->getConection(); // Establece la conexión cuando se crea la instancia
    }

    // Getter y Setter
    public function getId() {
        return $this->idpersona;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setId($idpersona) {
        $this->idpersona = $idpersona;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Establece la conexión con la base de datos
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Obtiene todos los registros de la tabla persona
    public function getPersonas() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }



}

// Uso del objeto Persona
//echo "persona" . "<br>";
//$p = new Persona();
//$personas = $p->getPersonas(); // Obtiene los datos de la base de datos

// Imprime los resultados
echo "<pre>";
//var_dump($personas);
echo "</pre>";
?>
>>>>>>> libreta/main
