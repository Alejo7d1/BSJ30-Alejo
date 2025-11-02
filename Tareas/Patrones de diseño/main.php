<?php

function separo($num, $patron){
    echo "<br>---------------------------------------------------------------<br>";
    echo "Ejercicio " . $num . ", Patron de diseño ". $patron . "<br>";
    echo "---------------------------------------------------------------<br>";
}

separo(1,"Factory");
include './Ejercicio1.php';

separo(2,"Adapter");
include './Ejercicio2.php';

separo(3,"Decorator");
include './Ejercicio3.php';

separo(4,"Strategy");
include './Ejercicio4.php';

?>