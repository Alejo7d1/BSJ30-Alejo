<?php
class Node{
    private $value;
    private $next;

    function __construct($valueParam){
        $this->value = $valueParam;
        $this->next = null;
    }

    function getValue(){
        return $this->value;
    }
    function getNext(){
        return $this->next;
    }
    function SetValue($data){
        $this->value = $data;
    }
    function SetNext($data){
        $this->next = $data;
    }

}

class LinkedList{
    private $head;

    function __construct(){
        $this->head = null;
    }

    function add ($value){

        $newNode = new Node($value);

        if($this->head === NULL){
            $this->head = $newNode;
        }else{
            $current = $this->head;

            while($current->getNext() !== null){
                $current = $current->getNext();
            }
            $current->SetNext($newNode);
        }
    }
}

$Listita = new LinkedList();
$Listita->add(3);
$Listita->add(1);
$Listita->add(5);
print_r($Listita);