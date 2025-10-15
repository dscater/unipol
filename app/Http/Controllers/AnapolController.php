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
}
