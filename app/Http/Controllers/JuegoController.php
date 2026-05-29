<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all();
        return response()->json($juegos);
    }

    public function create()
    {
        return view('adminCatalogo');
    }

    public function store(Request $request)
    {
        $this->validarJuego($request);
        $juego = Juego::create($request->all());
        return response()->json($juego);
    }

    public function show(string $id)
    {
        $juego = Juego::find($id);

        if (!$juego) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        return response()->json($juego);
    }

    public function edit(string $id)
    {
        $juego = Juego::find($id);

        if (!$juego) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        return response()->json($juego);
    }

    public function update(Request $request, string $id)
    {
        $this->validarJuego($request);

        $juego = Juego::find($id);

        if (!$juego) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        $juego->update($request->all());
        return response()->json($juego);
    }

    public function destroy(string $id)
    {
        $juego = Juego::find($id);

        if (!$juego) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        $juego->delete();
        return response()->json(['message' => 'Juego eliminado correctamente']);
    }

    public function destroyAll()
    {
        Juego::truncate();
        return response()->json(['message' => 'Todos los juegos han sido eliminados de la ludoteca']);
    }

    private function validarJuego(Request $request)
    {
        $request->validate([
            'nombre'           => 'required|string|max:100',
            'dificultad'       => 'required|string|in:Facil,Medio,Dificil',
            'edad_recomendada' => 'required|string|max:20',
            'numero_jugadores' => 'required|string|max:20',
            'imagen'           => 'required|string|max:255',
        ], [
            'dificultad.in' => 'La dificultad seleccionada no es válida.',
        ]);
    }
}
