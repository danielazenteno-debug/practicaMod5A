<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsistenteController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        return response()->json([
            'asistentes' => Asistente::all(),
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
            'email' => 'required|email',
            'telefono' => 'required',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'status' => 400,
            ], 400);
        }

        $asistente = Asistente::create($request->all());

        return response()->json([
            'asistente' => $asistente,
            'status' => 201,
        ], 201);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json([
                'message' => 'Asistente no encontrado',
                'status' => 404,
            ], 404);
        }

        return response()->json([
            'asistente' => $asistente,
            'status' => 200,
        ]);
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, $id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json([
                'message' => 'Asistente no encontrado',
                'status' => 404,
            ], 404);
        }

        $asistente->update($request->all());

        return response()->json([
            'asistente' => $asistente,
            'status' => 200,
        ]);
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     */
    public function destroy($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json([
                'message' => 'Asistente no encontrado',
                'status' => 404,
            ], 404);
        }

        $asistente->delete();

        return response()->json([
            'message' => 'Asistente eliminado',
            'status' => 200,
        ]);
    }
}