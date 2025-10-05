<?php
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