<?php
class Cliente {
    protected $nombre;
    protected $id;
    
    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    
    public function getNombre() { return $this->nombre; }
    public function getId() { return $this->id; }
}

class Lector extends Cliente {
    private $librosPrestados = [];
    
    public function solicitarPrestamo($biblioteca, $idLibro) {
        return $biblioteca->prestarLibro($idLibro, $this->nombre);
    }
}
?>