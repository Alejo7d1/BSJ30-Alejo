<?
/*-----------------LISTA ENLAZADA--------------------------*/
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

    //Agregar
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

    //Buscar
    function search($value){
        $current = $this->head;
        $pos = 0;
        while ($current !== null){
            if($current->getValue() == $value){
                echo "Valor encontrado en posición {$pos}\n";
                return true;
            }
            $current = $current->getNext();
            $pos++;
        }
        echo "Valor no encontrado";
        return false;
    }

    //Borrar
    function delete($value){
        if($this->head === null) return false;

        //Si el nodo a borrar está en head
        if($this->head->getValue() == $value){
            $this->head = $this->head->getNext();
            return true;
        }

        //Recorre buscando el valor
        $current = $this->head;
        while($current->getNext() !== null){
            if($current->getNext()->getValue() == $value){
                $current->setNext($current->getNext()->getNext());
                return true;
            }
            $current = $current->getNext();
        }

        return false;
    }
}

$Listita = new LinkedList();
$Listita->add(3);
$Listita->add(1);
$Listita->add(5);

$Listita->search(1);
$Listita->delete(1);
$Listita->search(1);

print_r($Listita);



/*------------------ARBOL BINARIO---------------------------------*/
class Nodo{
    private $value;
    private $left;
    private $right;

    function __construct($valueParam)
    {
        $this->value = $valueParam;
        $this->left = null;
        $this->right = null;
    }

    function getValue(){
        return $this->value;
    }
    function getLeft(){
        return $this->left;
    }
    function getRight(){
        return $this->right;
    }

    function setValue($data){
        $this->value = $data;
    }

    function setRight($data){
        $this->right = $data;
    }

    function setLeft($data){
        $this->left = $data;
    }
}

    class BinaryThree{
        private $root;

        function __construct($valueParam = null)
        {
            $this->root = $valueParam;
        }

        //Agregar
        function insert($data){
            $newNode = new Nodo($data);

            if($this->root === null){
                $this->root = $newNode;
                return $this->root;
            }
            
            $current = $this->root;
            
            while(true){
                if($newNode->getValue() > $current->getValue()){
                    if($current->getRight() === null){
                        $current->setRight($newNode);
                        return $newNode;
                    }else{
                        $current = $current->getRight();
                    }
                    
                }else{
                    if($current->getLeft() === null){
                        $current->setLeft($newNode);
                        return $newNode;
                    }else{
                        if($current->getLeft() === null){
                            $current->setLeft($newNode);
                            return $newNode;
                        }else{
                            $current = $current->getLeft();
                        }
                    }
                }
            }
    
        }

        //Buscar
        function search($data){//valor buscado
            $current = $this -> root; //establece a current en root 
            $nivel = 0;
                
            while ($current != null){ //recorre todo el arbol hasta hacer match
                if($data == $current->getValue()){
                    echo "Dato encontrado en nivel {$nivel}\n";
                    return true;
                }elseif(($data) > $current -> getValue()){
                    $current = $current->getRight();
                }else{
                    $current = $current->getLeft();
                }
                $nivel++; //cuenta el nivel
                }

                echo "Dato no encontrado\n";
                return false;
            }

        //Borrar rama
        function delete($node, $data) {
        if ($node == null) {
        return null;
        }

        if ($data < $node->getValue()) {
            $node->setLeft($this->delete($node->getLeft(), $data));
        } elseif ($data > $node->getValue()) {
            $node->setRight($this->delete($node->getRight(), $data));
        } else {
            return null; // Encuentra el nodo y se borra
            }

        return $node;
}
    }
    $nuevoNodo = new Nodo(10);

    $arbolito = new BinaryThree($nuevoNodo);
    echo "\n";

    $arbolito->insert(17);
    $arbolito->insert(19);
    $arbolito->insert(13);

    print_r($arbolito);
    $arbolito->search(13);
    $arbolito->delete($nuevoNodo, 13);
    $arbolito->search(13);


?>