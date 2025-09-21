<?

function imprimirPiramide(){
    $filas=5;
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
imprimirPiramide();

?>