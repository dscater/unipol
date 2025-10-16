<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InscripcionController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->postulante && Auth::user()->postulante->requisito) {
            return redirect()->route("inicio");
        }
        return Inertia::render("Admin/Postulante/Inscripcion");
    }
}
