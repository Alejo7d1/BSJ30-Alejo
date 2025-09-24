<?
//lista enlazada
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



//Arbol binario
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

        function search($data){//valor buscado
                $current = $this -> root; //establece a current en root 
                $nivel = 0;
                
                while ($current != null){ //recorre todo el arbol hasta hacer match
                    if($data == $current->getValue()){
                        echo "Dato encontrado en nivel {$nivel}";
                        return true;
                    }elseif(($data) > $current -> getValue()){
                        $current = $current->getRight();
                    }else{
                        $current = $current->getLeft();
                    }
                    $nivel++; //cuenta el nivel
                }

                echo "Dato no encontrado";
                return false;
            }
    }
    $nuevoNodo = new Nodo(10);

    $arbolito = new BinaryThree($nuevoNodo);
    echo "\n";

    $arbolito->insert(17);
    $arbolito->insert(19);
    $arbolito->insert(13);

    print_r($arbolito);
    $arbolito->search(14);

    
?>