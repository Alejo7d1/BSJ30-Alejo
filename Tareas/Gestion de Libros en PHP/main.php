<?php

require_once 'controllers/BibliotecaController.php';

$controller = new BibliotecaController();

// Procesar acciones si vienen desde el formulario
$accion = $_POST['accion'] ?? null;
$data = $controller->manejarAccion($accion, $_POST);

// Mostrar vista
require 'views/biblioteca.view.php';
