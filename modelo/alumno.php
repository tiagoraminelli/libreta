<?php
require_once "db.php";
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
}

?>