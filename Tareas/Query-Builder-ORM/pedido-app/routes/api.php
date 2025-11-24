<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Rutas
    // Insertar datos
    Route::post('/', [MainController::class, 'insertarDatos']);
    
    // Consultas
    Route::get('/usuario/{usuarioId}', [MainController::class, 'pedidosPorUsuario']);
    Route::get('/pedidos/usuarios', [MainController::class, 'pedidosConUsuarios']);
    Route::get('/pedidos/range', [MainController::class, 'pedidosPorRango']);
    Route::get('/usuarios/search/{letra}', [MainController::class, 'usuariosPorLetra']);
    Route::get('/pedidos/usuario/{usuarioId}', [MainController::class, 'contarPedidosUsuario']);
    Route::get('/pedidos', [MainController::class, 'pedidosOrdenadosTotal']);
    Route::get('/pedidos/total', [MainController::class, 'sumaTotalPedidos']);
    Route::get('/pedido/economico', [MainController::class, 'pedidoMasEconomico']);
    Route::get('/usuarios/pedidos', [MainController::class, 'pedidosAgrupadosUsuario']);
    Route::get('/', [MainController::class, 'verDatos']);
?>