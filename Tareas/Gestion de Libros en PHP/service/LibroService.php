<?php
session_start();

require_once 'models/Libro.php';

class LibroService {
    private $libros = [];
    private $prestamos = [];

    public function __construct() {
        if (isset($_SESSION['libros'])) {
            $this->libros = $_SESSION['libros'];
        } else {
            // Libros iniciales
            $this->libros = [
                1 => new Libro(1, "El Quijote", "Miguel de Cervantes", "Clásico"),
                2 => new Libro(2, "Fahrenheit 451", "Ray Bradbury", "Ciencia Ficción"),
                3 => new Libro(3, "Rayuela", "Julio Cortázar", "Novela")
            ];
            $this->guardarEnSession();
        }
    }

    private function guardarEnSession() {
        $_SESSION['libros'] = $this->libros;
    }

    // listar todos los libros
    public function listarLibros() {
        return $this->libros;
    }

    public function agregarLibro(Libro $libro) {
        $this->libros[$libro->getId()] = $libro;
        $this->guardarEnSession();
    }

    public function editarLibro($id, $titulo, $autor, $categoria) {
        if (isset($this->libros[$id])) {
            $this->libros[$id]->setTitulo($titulo);
            $this->libros[$id]->setAutor($autor);
            $this->libros[$id]->setCategoria($categoria);
            $this->guardarEnSession();
            return true;
        }
        return false;
    }

    public function eliminarLibro($id) {
        if (isset($this->libros[$id])) {
            unset($this->libros[$id]);
            $this->guardarEnSession();
            return true;
        }
        return false;
    }

    // Buscar libros
    public function buscarLibros($criterio, $tipo = 'titulo') {
        $resultados = [];
        
        foreach ($this->libros as $libro) {
            switch ($tipo) {
                case 'titulo':
                    if (stripos($libro->getTitulo(), $criterio) !== false) {
                        $resultados[] = $libro;
                    }
                    break;
                    
                case 'autor':
                    if (stripos($libro->getAutor(), $criterio) !== false) {
                        $resultados[] = $libro;
                    }
                    break;
                    
                case 'categoria':
                    if (stripos($libro->getCategoria(), $criterio) !== false) {
                        $resultados[] = $libro;
                    }
                    break;
            }
        }
        return $resultados;
    }

    // Prestar libro
    public function prestarLibro($idLibro, $usuario) {
        if (isset($this->libros[$idLibro]) && $this->libros[$idLibro]->getDisponible()) {
            $this->libros[$idLibro]->prestar();
            $this->prestamos[] = [
                'id_libro' => $idLibro,
                'usuario' => $usuario,
                'fecha_prestamo' => date('Y-m-d H:i:s')
            ];
            $this->guardarEnSession();
            return true;
        }
        return false;
    }

    // Devolver libro
    public function devolverLibro($idLibro) {
        if (isset($this->libros[$idLibro])) {
            $this->libros[$idLibro]->devolver();
            $this->guardarEnSession();
            return true;
        }
        return false;
    }

    // obtener un libro
    public function obtenerLibro($id) {
        return isset($this->libros[$id]) ? $this->libros[$id] : null;
    }

    // limpiar la biblioteca
    public function resetearBiblioteca() {
        $this->libros = [
            1 => new Libro(1, "El Quijote", "Miguel de Cervantes", "Clásico"),
            2 => new Libro(2, "Fahrenheit 451", "Ray Bradbury", "Ciencia Ficción"),
            3 => new Libro(3, "Rayuela", "Julio Cortázar", "Novela")
        ];
        $this->guardarEnSession();
    }
}