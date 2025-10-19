<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EsbapolmusController extends Controller
{
    public function index()
    {
        return Inertia::render("Portal/Esbapolmus/Index");
    }

    public function nuestra_academia()
    {
        return Inertia::render("Portal/Esbapolmus/NuestraAcademia");
    }
    public function requisitos()
    {
        return Inertia::render("Portal/Esbapolmus/Requisitos");
    }
    public function fase_convocatoria()
    {
        return Inertia::render("Portal/Esbapolmus/FaseConvocatoria");
    }
    public function fase_seleccion()
    {
        return Inertia::render("Portal/Esbapolmus/FaseSeleccion");
    }
    public function fase_incorporacion()
    {
        return Inertia::render("Portal/Esbapolmus/FaseIncorporacion");
    }
    public function comunicados()
    {
        return Inertia::render("Portal/Esbapolmus/Comunicados");
    }
    public function getComunicados(Request $request)
    {
        $comunicados = Comunicado::where("unidad", "ESBAPOLMUS")->orderBy("created_at", "desc")->paginate(1);
        return response()->JSON(["comunicados" => $comunicados]);
    }
    public function contactos()
    {
        return Inertia::render("Portal/Esbapolmus/Contactos");
    }

    public function antecedentes()
    {
        return Inertia::render("Portal/Esbapolmus/Antecedentes");
    }
    public function evaluacion_medica()
    {
        return Inertia::render("Portal/Esbapolmus/EvaluacionMedica");
    }
}
