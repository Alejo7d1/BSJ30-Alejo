<?php
class Libro {
    private $id;
    private $titulo;
    private $autor;
    private $categoria;
    private $disponible;
    
    public function __construct($id, $titulo, $autor, $categoria) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->disponible = true;
    }
    
    // Getters
    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getAutor() { return $this->autor; }
    public function getCategoria() { return $this->categoria; }
    public function getDisponible() { return $this->disponible; }
    
    // Setters
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function setDisponible($disponible) { $this->disponible = $disponible; }
    
    public function prestar() {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }
    
    public function devolver() {
        $this->disponible = true;
    }
}
?>