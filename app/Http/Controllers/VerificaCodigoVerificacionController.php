<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificaCodigoVerificacionController extends Controller
{
    public function verificarCodigo(Request $request, User $user)
    {
        $codigo = $request->input("codigo");
        if ($user->codigo == $codigo) {
            Auth::login($user);
            return response()->JSON(["user" => Auth::user()]);
        }
        return response()->JSON(["error" => "El código es incorrecto intente nuevamente"]);
    }
}
