<?

//Problema de la serie Fibonacci
function fibonacci (int $num){
    $a = 0;
    $b = 1;
    $total = 0;
    for($i=0; $i<$num; $i++){
        echo "$total ";
        $total = ($a + $b);
        $b = $a;
        $a = $total;
    }
}
fibonacci(8);

//Problema de números Primos
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


//Problema de Palíndromos
function esPalindromo(string $palabra): string {
    $j = 0;

    for ($i = strlen($palabra)-1; $i >= 0; $i--) {//invierte la palabra y la guarda en arreglo
    $reves[$j] = $palabra[$i];
    $j++;
    }
    if(str_split($palabra) === $reves){//compara $palabra como arreglo con el arreglo $reves
        return "$palabra es palindroma";
    }
    return  "$palabra no es palindroma";
}

echo esPalindromo("apopa")."\n";
echo esPalindromo("ornitorrinco");
?>