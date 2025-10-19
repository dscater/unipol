<?php

namespace App\Http\Controllers;

use App\Models\DescargaDocumento;
use App\Models\Parametrizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InicioController extends Controller
{


    public function inicio()
    {
        $array_infos = UserController::getInfoBoxUser();

        if (Auth::user()->tipo == 'POSTULANTE') {
            $listDescargaDocumentos = DescargaDocumento::all();
            $listVideos = [
                [
                    "descripcion" => "Video 1",
                    "url_video" => asset("videos/video1.mp4"),
                    "ext" => "mp4"
                ],
            ];

            return Inertia::render('Admin/Postulante/Inicio', compact("listDescargaDocumentos", "listVideos"));
        }

        return Inertia::render('Admin/Home', compact('array_infos'));
    }

    public function evaluaciones()
    {
        $evaluacionMedica = Auth::user()->postulante->evaluacion_medica ?? null;
        $evaluacionPsicologica = Auth::user()->postulante->evaluacion_psicologica ?? null;
        $evaluacionFisica = Auth::user()->postulante->evaluacion_fisica ?? null;
        $evaluacionInstruccion = Auth::user()->postulante->evaluacion_instruccion ?? null;
        $evaluacionConocimiento = Auth::user()->postulante->evaluacion_conocimiento ?? null;
        $evaluacionOdontologica = Auth::user()->postulante->evaluacion_odontologica ?? null;

        return Inertia::render("Admin/Postulante/Evaluaciones", compact(
            "evaluacionMedica",
            "evaluacionPsicologica",
            "evaluacionFisica",
            "evaluacionInstruccion",
            "evaluacionConocimiento",
            "evaluacionOdontologica",
        ));
    }
    public function vestibulares()
    {
        return Inertia::render("Admin/Postulante/Vestibulares");
    }
}
