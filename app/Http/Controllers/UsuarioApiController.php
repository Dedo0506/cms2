<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioApiController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->name = $request['name'];
        $usuario->email = $request['email'];
        $usuario->password = bcrypt($request['password']); // Corregir el cifrado de la contraseña
        $usuario->save();

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->name = $request['name'];
        $usuario->email = $request['email'];
        $usuario->password = bcrypt($request['password']); // Corregir el cifrado de la contraseña
        $usuario->save();

        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json('Usuario eliminado', 204); // Devolver 204 No Content después de eliminar el usuario
    }
}
