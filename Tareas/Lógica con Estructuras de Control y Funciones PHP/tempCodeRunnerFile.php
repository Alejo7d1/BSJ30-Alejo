<?php
function esPrimo(int $num): string {

    if($num <= 1){
        return "No es primo";
    }

    for($i=2; $i<$num; $i++){
        if(fmod(($num/$i),1) == 0){ //Si la división no tiene decimales quiere decir que es multiplo
            return "$num no es primo";
        }
    }return "$num es primo";
}
echo esPrimo(23)."\n";
echo esPrimo(12)."\n";