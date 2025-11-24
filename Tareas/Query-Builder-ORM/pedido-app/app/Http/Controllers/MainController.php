<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //Insertar registros en las tablas
    public function insertarDatos(Request $request)
    {
        $request->validate([
            'usuarios' => 'required|array',
            'usuarios.*.nombre' => 'required|string',
            'usuarios.*.correo' => 'required|email',
            'usuarios.*.telefono' => 'nullable|string',
            'pedidos' => 'required|array',
            'pedidos.*.producto' => 'required|string',
            'pedidos.*.cantidad' => 'required|integer',
            'pedidos.*.total' => 'required|numeric',
            'pedidos.*.id_usuario' => 'required|integer'
        ]);

        DB::transaction(function () use ($request) {
            // Insertar usuarios
            foreach ($request->usuarios as $usuarioData) {
                Usuario::create($usuarioData);
            }

            // Insertar pedidos
            foreach ($request->pedidos as $pedidoData) {
                Pedido::create($pedidoData);
            }
        });

        return response()->json([
            'message' => 'Datos insertados correctamente'
        ]);
    }

    //Recuperar todos los pedidos de un usuario específico
    public function pedidosPorUsuario($usuarioId)
    {
        $pedidos = Pedido::where('id_usuario', $usuarioId)->get();

        return response()->json([
            'data' => $pedidos,
            'total' => $pedidos->count()
        ]);
    }

    // Obtener información detallada de pedidos con datos de usuarios
    public function pedidosConUsuarios()
    {
        $pedidos = Pedido::with('usuario:id,nombre,correo')->get();

        return response()->json([
            'data' => $pedidos,
            'total' => $pedidos->count()
        ]);
    }

    //Pedidos por rango total
    public function pedidosPorRango(Request $request)
    {
        $request->validate([
            'min' => 'required|numeric',
            'max' => 'required|numeric'
        ]);

        $pedidos = Pedido::whereBetween('total', [$request->min, $request->max])->get();

        return response()->json([
            'data' => $pedidos,
            'total' => $pedidos->count()
        ]);
    }

    //Usuarios por letra inicial del nombre
    public function usuariosPorLetra($letra)
    {
        $usuarios = Usuario::where('nombre', 'LIKE', $letra . '%')->get();

        return response()->json([
            'data' => $usuarios,
            'total' => $usuarios->count()
        ]);
    }

    //Contar pedidos de un usuario
    public function contarPedidosUsuario($usuarioId)
    {
        $total = Pedido::where('id_usuario', $usuarioId)->count();

        return response()->json([
            'usuario_id' => $usuarioId,
            'total_pedidos' => $total
        ]);
    }

    //Pedidos con usuarios ordenados por total
    public function pedidosOrdenadosTotal()
    {
        $pedidos = Pedido::with('usuario:id,nombre,correo')
            ->orderBy('total', 'DESC')
            ->get();

        return response()->json([
            'data' => $pedidos,
            'total' => $pedidos->count()
        ]);
    }

    // Suma total de todos los pedidos
    public function sumaTotalPedidos()
    {
        $suma = Pedido::sum('total');

        return response()->json([
            'suma_total' => $suma
        ]);
    }

    //Pedido más económico con información del usuario
    public function pedidoMasEconomico()
    {
        $pedido = Pedido::with('usuario:id,nombre')
            ->orderBy('total', 'ASC')
            ->first();

        return response()->json([
            'data' => $pedido
        ]);
    }

    // Pedidos agrupados por usuario
    public function pedidosAgrupadosUsuario()
    {
        $pedidos = Pedido::select('id_usuario', 'producto', 'cantidad', 'total')
            ->orderBy('id_usuario')
            ->orderBy('producto')
            ->get()
            ->groupBy('id_usuario');

        return response()->json([
            'data' => $pedidos
        ]);
    }

    //Ver todos los datos 
    public function verDatos()
    {
        $usuarios = Usuario::with('pedidos')->get();
        
        return response()->json([
            'usuarios' => $usuarios,
            'total_usuarios' => $usuarios->count(),
            'total_pedidos' => Pedido::count()
        ]);
    }
}
