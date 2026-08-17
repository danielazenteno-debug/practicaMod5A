<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PonenteController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return response()->json([
            'ponentes' => Ponente::all(),
            'status' => 200,
        ]);
    }

    /**
     * Almacenar un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'nullable',
            'especialidad' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'status' => 400,
            ], 400);
        }

        $ponente = Ponente::create($request->all());

        return response()->json([
            'ponente' => $ponente,
            'status' => 201,
        ], 201);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show($id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        return response()->json([
            'ponente' => $ponente,
            'status' => 200,
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        $ponente->update($request->all());

        return response()->json([
            'ponente' => $ponente,
            'status' => 200,
        ]);
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy($id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        $ponente->delete();

        return response()->json([
            'message' => 'Ponente eliminado',
            'status' => 200,
        ]);
    }
}