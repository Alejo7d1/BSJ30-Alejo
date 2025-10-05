<?php
echo "<h3>HOLIWIS LLEGASTE A PROCESAMIENTO DE DATOS</h3>";



/*

Variables reservadas Php
$_FILES -> Trabajar o manejar archivos subidos por el cliente
$_POST -> Manejamos datos enviador por el cliente
$_SESSION -> Nos permite guardar datos en el almacenamiento local del cliente
$_COOKIE -> Manejar las cookies del navegador del cliente

*/
print_r($_POST);
print_r($_POST["nombre"]);

class User {
    private $name;
    private $age;
    private $email;

    function __construct($name, $age, $email){
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    function getUser(){
        return $this;
    }
}

$user = new User($_POST("nombre"), $_POST("edad"), $_POST("email"));
print_r($user->getUser());

?>