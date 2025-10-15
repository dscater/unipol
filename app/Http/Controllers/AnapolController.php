<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AnapolController extends Controller
{
    public function index()
    {
        return Inertia::render("Portal/Anapol/Index");
    }

    public function nuestra_academia()
    {
        return Inertia::render("Portal/Anapol/NuestraAcademia");
    }
    public function requisitos()
    {
        return Inertia::render("Portal/Anapol/Requisitos");
    }
    public function fase_convocatoria()
    {
        return Inertia::render("Portal/Anapol/FaseConvocatoria");
    }
    public function fase_seleccion()
    {
        return Inertia::render("Portal/Anapol/FaseSeleccion");
    }
    public function fase_incorporacion()
    {
        return Inertia::render("Portal/Anapol/FaseIncorporacion");
    }
    public function comunicados()
    {
        return Inertia::render("Portal/Anapol/Comunicados");
    }
    public function contactos()
    {
        return Inertia::render("Portal/Anapol/Contactos");
    }
}
