<?php

require_once 'models/Libro.php';
require_once 'service/LibroService.php';
require_once 'models/Lector.php';

class BibliotecaController
{
    private $libroService;

    public function __construct(){
        $this->libroService = new LibroService();
    }

    public function manejarAccion($accion, $input)
    {
        $resultado = null;

        switch ($accion) {

            case "buscar":
                $query = trim($input["query"]);
                $campo = $input["campo"];
                $resultado = $this->libroService->buscarLibros($query, $campo);
                break;

            case "prestar":
                $lector = new Lector(1, "Usuario"); // lector temporal
                $idLibro = intval($input["idLibro"]);
                $resultado = $lector->solicitarPrestamo($this->libroService, $idLibro)
                    ? "Libro prestado correctamente."
                    : "No se pudo prestar el libro (quizás ya esté prestado).";
                break;

            case "devolver":
                $idLibro = intval($input["idLibro"]);
                $resultado = $this->libroService->devolverLibro($idLibro)
                    ? "Libro devuelto correctamente."
                    : "No se pudo devolver el libro.";
                break;

            case "editar":
                $id = intval($input["idLibro"]);
                $titulo = $input["titulo"];
                $autor = $input["autor"];
                $cat = $input["categoria"];

                $resultado = $this->libroService->editarLibro($id, $titulo, $autor, $cat)
                    ? "Libro editado con éxito."
                    : "No se encontró el libro.";
                break;
            case "agregar":
                $id = intval($input["idLibro"]);
                $titulo = trim($input["titulo"]);
                $autor = trim($input["autor"]);
                $categoria = trim($input["categoria"]);

                if (empty($titulo) || empty($autor) || empty($categoria)) {
                    $resultado = "Error: Todos los campos son obligatorios.";
                } elseif ($id <= 0) {
                    $resultado = "Error: El ID debe ser un número positivo.";
                } elseif (isset($this->libroService->listarLibros()[$id])) {
                    $resultado = "Error: Ya existe un libro con ese ID.";
                } else {
                    $nuevoLibro = new Libro($id, $titulo, $autor, $categoria);
                    $this->libroService->agregarLibro($nuevoLibro);
                    $resultado = "Libro agregado correctamente.";
                }
                break;
        }

        return [
            "resultado" => $resultado,
            "libros" => $this->libroService->listarLibros()
        ];
    }
}
