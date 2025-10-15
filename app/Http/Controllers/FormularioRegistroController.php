<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormularioRegistroController extends Controller
{
    public function index(Postulante $postulante)
    {
        return Inertia::render("Admin/FormularioRegistro/Index", compact("postulante"));
    }

    public function store(Request $request, Postulante $postulante) {}
}
