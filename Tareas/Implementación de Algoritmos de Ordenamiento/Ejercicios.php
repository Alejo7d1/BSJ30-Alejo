<?

//Burble Sort
function bubbleSort($lista) {
    $n = count($lista);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($lista[$j] < $lista[$j + 1]) {
                $temp = $lista[$j];
                $lista[$j] = $lista[$j + 1];
                $lista[$j + 1] = $temp;
            }
        }
    }
    return $lista;
}

$lista = [45,32,-5,-6,32,-14,1,8];
//Antes
print_r($lista);
//Despues
print_r(bubbleSort($lista));


//InsertionSort
function insertionSort($lista) {
    $n = count($lista);
    for ($i = 1; $i < $n; $i++) {
        $key = $lista[$i];
        $j = $i - 1;

        while ($j >= 0 && strcmp($lista[$j], $key) > 0) { //strcmp compara segun cada texto en ascii y retorna una posición
            $lista[$j + 1] = $lista[$j];
            $j--;
        }
        $lista[$j + 1] = $key;
    }
    return $lista;
}

$listaP = ['pudin','arroz','zapato','barril','pechuga deshuesada 1lb porfavor'];
//Antes
print_r($listaP);
//Despues
print_r(insertionSort($listaP));


//MergeSort
function mergeSort($lista) {
    if (count($lista) <= 1) {
        return $lista;
    }

    $middle = floor(count($lista) / 2);
    $left = array_slice($lista, 0, $middle);
    $right = array_slice($lista, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];

    while (count($left) > 0 && count($right) > 0) {
        if (strcmp($left[0], $right[0]) <= 0) { //Se vuelve a usar strcmp para la comparación
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    return array_merge($result, $left, $right);
}

$listaN = ['Oscar Osorio','Antonio Antonelo','Zarza Zapata','Benjamin Jasmín','Pechuga Deshuesada 1lb porfavor'];
//Antes
print_r($listaN);
//Despues
print_r(mergeSort($listaN));




?>