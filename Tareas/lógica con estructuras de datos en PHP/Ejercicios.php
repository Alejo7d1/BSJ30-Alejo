<?
//Problema de Lista Invertida
function invertido(array $num): array{
    $invertido = [];
    $j=0;
    for ($i = count($num)-1; $i >= 0; $i--) {
        $invertido[$j]=$num[$i];
        $j++;
    }
    return($invertido);
}
print_r(invertido([1,2,4,5,6,7,8]));

//Problema de Suma de Números Pares
function pares(array $num){
    $total = 0;
    for ($i=0; $i < count($num); $i++) { 
        if($num[$i] % 2 == 0){ // si el residuo entre 2 es 0 es par
            $total += $num[$i];
            echo "$num[$i] + ";
        }
    }
    echo "= $total";
}
pares([1,2,3,4,8,6,7,8]);

//Problema de Frecuencia de Caracteres
function frecuencia(string $palabra): array {
    $frecuencia = [];

    for ($i = 0; $i < strlen($palabra); $i++) {
        $frecuencia[$palabra[$i]] = 0;
    }

    for ($i = 0; $i < strlen($palabra); $i++) {
        $frecuencia[$palabra[$i]]++;
    }

    return $frecuencia;
}

print_r(frecuencia("apopa"));


// Problema de Bucle Anidado
function imprimirPiramide(int $filas){
//1er bucle es para la Altura
//Por eso empieza en 1 y se repite hasta la cantidad de altura que queremos que tenga
    for($i=1; $i <= $filas; $i++){
        //2do bucle controla los espacios en blanco antes dibujar
        for($espacios = 1; $espacios <= $filas - $i; $espacios++){
            print " ";
        }
        //3er bucle controlar los asteriscos por fila
        //formula para saber cuantos asteriscos necesitamos es (2 * $i - 1)
        for($asteriscos = 1; $asteriscos <= (2 * $i - 1); $asteriscos++){
            echo "*";
        }
        echo"\n";
    }
}
imprimirPiramide(20);
?>

