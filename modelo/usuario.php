<?php
require_once "bd.php";
require_once "persona.php";

class Usuario extends Persona {
    protected $table = "usuario"; // Tabla para la clase Usuario

    private $idUsuario;
    private $nombre;
    private $contraseña;

    // Constructor
    public function __construct($idUsuario = null, $nombre = null, $contraseña = null) {
        // Llamada al constructor de la clase base (Persona) si es necesario
        parent::__construct(); // Llama al constructor de Persona

        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
    }

    // Getters
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    // Setters
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    // Establece la conexión con la base de datos
    public function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }

    // Obtiene todos los registros de la tabla usuario
    public function getUsuarios() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

       // Obtiene todos los datos de la tabla usuario
       public function getDatosUsuarios() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM " . $this->table." ,persona WHERE usuario.idUsuario = persona.idpersona";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }





}

// Ejemplo de uso
$usuario = new Usuario();
$usuarios = $usuario->getDatosUsuarios(); // Obtén los datos de la base de datos


// Imprime los resultados
echo "<pre>";
var_dump($usuarios);
echo "</pre>";
?>
