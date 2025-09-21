<?php echo '<p>Hola mundo </p>'; 

//Recorrer un array
foreach($array as $valor){
    echo "Valor: {$valor}\n";
}

//Arrays multidimensionales
$arrayMultidimensional = [
    "nombre" => "Paco",
    "Edad" => 24,
    "hobbie" => ["Programar", "leer", "pescar", "otros" => ["jugar jueguitos" => ["lol","dota2","CS2"]]]
    ];

//Clases y Objetos
class Persona {
    //atributos
    private $nombre;
    private $edad;

    //Constructor
    function __construct($nombreParam, $edadParam)
    {
        $this->nombre = $nombreParam;
        $this->edad = $edadParam; 
    }

    /* Get the value of nombre*/ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /* Set the value of nombre @return  self*/ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /* Get the value of edad*/ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }
}

//crear un objeto
$persona1 = new Persona("Paco",1450);

//LIFO -> stack -> Last IN First Out

//FIFO -> Queue -> Firt IN First Out



?>