<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;

class PrestamoController extends Controller
{
    // Crear préstamo
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'numero_personas' => 'required|string|max:20',
            'juegos' => 'required'
        ]);

        $codigo = strtoupper(substr(md5(time()), 0, 8));

        $prestamo = Prestamo::create([
            'nombre_cliente' => $request->nombre_cliente,
            'numero_personas' => $request->numero_personas,
            'juegos' => json_encode($request->juegos),
            'codigo_confirmacion' => $codigo,
            'estado' => 'Pendiente'
        ]);

        return response()->json([
            'message' => 'Solicitud registrada',
            'codigo' => $codigo,
            'prestamo' => $prestamo
        ]);
    }

    // Ver solicitudes
    public function adminIndex()
    {
        $prestamos = Prestamo::all();

        return response()->json($prestamos);
    }

    // Cambiar estado
    public function updateEstado(Request $request, $id)
    {
        $prestamo = Prestamo::find($id);

        if (!$prestamo) {
            return response()->json([
                'message' => 'Préstamo no encontrado'
            ], 404);
        }

        $prestamo->estado = $request->estado;
        $prestamo->save();

        return response()->json([
            'message' => 'Estado actualizado',
            'prestamo' => $prestamo
        ]);
    }

    // Confirmar código
    public function confirmarCodigo(Request $request, $id)
    {
        $prestamo = Prestamo::find($id);

        if (!$prestamo) {
            return response()->json([
                'message' => 'Préstamo no encontrado'
            ], 404);
        }

        if ($prestamo->codigo_confirmacion === $request->codigo) {

            return response()->json([
                'message' => 'Código válido'
            ]);
        }

        return response()->json([
            'message' => 'Código incorrecto'
        ], 400);
    }
}