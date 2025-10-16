<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRegistroStoreRequest;
use App\Http\Requests\FormularioRegistroUpdateRequest;
use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class FormularioRegistroController extends Controller
{
    public function index(Postulante $postulante)
    {
        $postulante = $postulante->setAppends([
            "url_foto",
            "full_name",
            "full_ci",
            "fecha_registro_t",
        ]);
        return Inertia::render("Admin/FormularioRegistro/Index", compact("postulante"));
    }

    public function store(FormularioRegistroStoreRequest $request, Postulante $postulante)
    {
        $datos = $request->validated();
        $ci = $datos["ci"];
        $codigo = $datos["codigo"];
        if ($postulante->codigoPre != trim($codigo)) {
            // generar un error del campo codigo
            throw ValidationException::withMessages([
                "codigo" => "El código ingresado no es correcto"
            ]);
        }

        if ($postulante->ci != trim($ci)) {
            // generar un error del campo codigo
            throw ValidationException::withMessages([
                "ci" => "El Nro. de C.I. ingresado no es correcto"
            ]);
        }

        DB::beginTransaction();
        try {
            $postulante->ecodigo = 1;
            $postulante->save();
            DB::commit();
            return redirect()->route("formularioRegistro.registro", $postulante->id)->with("bien", "Registro realizado");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    public function registro(Postulante $postulante)
    {
        if ($postulante->ecodigo == 1) {
            return Inertia::render("Admin/FormularioRegistro/Registro", compact("postulante"));
        }
        return redirect()->route("formularioRegistro.index", $postulante->id)->with("bien", "Registro realizado");
    }
    public function update(FormularioRegistroUpdateRequest $request, Postulante $postulante)
    {
        $datos = $request->validated();
        $password = $datos["password"];
        $foto = $datos["foto"];
        DB::beginTransaction();
        try {
            $user = $postulante->user;
            $user->password = $password;
            //foto
            $extension = "." . $foto->getClientOriginalExtension();
            $nomFoto = $user->id . time() . $extension;
            //usuario
            $user->foto = $nomFoto;
            $user->acceso = 1;
            $user->save();

            $foto->move(public_path('imgs/users'), $nomFoto);


            //postulante
            $postulante->epass = 1;
            $postulante->foto = $nomFoto;
            $postulante->save();
            DB::commit();
            return redirect()->route("portal.index")->with("bien", "Registro éxitoso. Ahora puedes Iniciar Sesión");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }
}
