<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InscripcionController extends Controller
{
    public function index()
    {
        return Inertia::render("Admin/Postulante/Inscripcion");
    }
}
