<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class VerificaCodigoVerificacionController extends Controller
{
    public function verificarCodigo(Request $request, User $user)
    {
        try {
            $codigo = $request->input("codigo");
            if ($user->codigo == $codigo) {
                Auth::login($user);
                return response()->JSON(["user" => Auth::user()]);
            }
            throw new Exception("El código es incorrecto intente nuevamente", 401);
        } catch (\Exception $e) {
            // Log::debug($e->getCode());
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ], $e->getCode());
        }
    }
}
