<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FatescipolController extends Controller
{
    public function index()
    {
        return Inertia::render("Portal/Fatescipol/Index");
    }

    public function nuestra_academia()
    {
        return Inertia::render("Portal/Fatescipol/NuestraAcademia");
    }
    public function requisitos()
    {
        return Inertia::render("Portal/Fatescipol/Requisitos");
    }
    public function fase_convocatoria()
    {
        return Inertia::render("Portal/Fatescipol/FaseConvocatoria");
    }
    public function fase_seleccion()
    {
        return Inertia::render("Portal/Fatescipol/FaseSeleccion");
    }
    public function fase_incorporacion()
    {
        return Inertia::render("Portal/Fatescipol/FaseIncorporacion");
    }
    public function comunicados()
    {
        return Inertia::render("Portal/Fatescipol/Comunicados");
    }
    public function getComunicados(Request $request)
    {
        $comunicados = Comunicado::where("unidad", "FATESCIPOL")->orderBy("created_at", "desc")->paginate(1);
        return response()->JSON(["comunicados" => $comunicados]);
    }
    public function contactos()
    {
        return Inertia::render("Portal/Fatescipol/Contactos");
    }

    public function antecedentes()
    {
        return Inertia::render("Portal/Fatescipol/Antecedentes");
    }
    public function evaluacion_medica()
    {
        return Inertia::render("Portal/Fatescipol/EvaluacionMedica");
    }
}
