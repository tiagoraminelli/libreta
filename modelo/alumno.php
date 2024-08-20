<?php
require_once "bd.php";
require_once "persona.php";
class alumno extends persona{
protected $table = "alumno"; //creamos la tabla
protected $conection; //protegemos el atributo de conexion;
protected $cantidad; //protegemos la cantidad 

    private $correo;
    private $secundario;

    // Constructor
    public function __construct($correo = null, $secundario = null) {
        $this->correo = $correo;
        $this->secundario = $secundario;
    }

    //conexion
    private function getConection() {
        $db = new Db(); // Crea un nuevo objeto de la clase Db
        $this->conection = $db->conection; // Asigna la conexión a la propiedad
    }
    

    // Getter y Setter para correo
    public function getCorreo() {
        return $this->correo;
    }

  

    // Getter y Setter para secundario
    public function getSecundario() {
        return $this->secundario;
    }


//setters
    public function setCorreo($correo) {
            $this->correo = $correo;
    }
    public function setSecundario($secundario) {  
            $this->secundario = $secundario;
    }

    
    public function fetchAlumnosDataById($id) {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM alumno,persona WHERE alumno.idalumno = ? and persona.idpersona = ? ";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id,$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos los resultados de la consulta
    }

    public function fetchAlumnosData() {
        $this->getConection(); // Asegura que la conexión esté establecida
        $sql = "SELECT * FROM alumno,persona WHERE alumno.idalumno = persona.idpersona  ";
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


}//fin de la clase

?>