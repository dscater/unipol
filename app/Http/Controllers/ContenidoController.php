<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    private $listContenido = [
        1 => [
            "contenido" => "1",
            "titulo" => "NÚMERO DE PLAZAS VACANTES"
        ],
        2 => [
            "contenido" => "2",
            "titulo" => "ESCALA DE CALIFICACIÓN DE LAS EVALUACIONES"
        ],
        3 => [
            "contenido" => "3",
            "titulo" => "CONDICIONES PARA LA ADMISIÓN E INCORPORACIÓN"
        ],
        4 => [
            "contenido" => "4",
            "titulo" => "CAUSALES DE SEPARACIÓN DEL PROCESO DE ADMISIÓN"
        ],
        5 => [
            "contenido" => "5",
            "titulo" => "FASES DEL PROCESO DE ADMISIÓN"
        ],
        6 => [
            "contenido" => "6",
            "titulo" => "CONVOCATORIA"
        ],
        7 => [
            "contenido" => "7",
            "titulo" => "TABLA DE PRECIOS"
        ],
        8 => [
            "contenido" => "8",
            "titulo" => "REQUISITOS DE INSCRIPCIÓN"
        ],
        9 => [
            "contenido" => "9",
            "titulo" => "FASE DE SELECCIÓN"
        ],
        10 => [
            "contenido" => "10",
            "titulo" => "ETAPA DE EVALUACIÓN MÉDICA"
        ],
        11 => [
            "contenido" => "11",
            "titulo" => "ETAPA DE EVALUACIÓN PSICOLÓGICA"
        ],
        12 => [
            "contenido" => "12",
            "titulo" => "ETAPA DE LA EVALUACIÓN DE APTITUD FÍSICA "
        ],
        13 => [
            "contenido" => "13",
            "titulo" => "ETAPA DEL PREFACULTATIVO"
        ],
        14 => [
            "contenido" => "14",
            "titulo" => "FASE DE INCORPORACIÓN"
        ],
        15 => [
            "contenido" => "15",
            "titulo" => "CANTIDAD DE POSTULANTES ADMITIDOS"
        ],
        16 => [
            "contenido" => "16",
            "titulo" => "PUBLICACIÓN DE LA LISTA DE ADMITIDOS E INCORPORACIÓN DE POSTULANTES"
        ],
        17 => [
            "contenido" => "17",
            "titulo" => "DOCUMENTOS PARA LA INCORPORACIÓN"
        ],
        18 => [
            "contenido" => "18",
            "titulo" => "VALIDEZ DE LA ACEPTACIÓN"
        ],
        19 => [
            "contenido" => "19",
            "titulo" => "PLAZO DE INCORPORACIÓN"
        ],
    ];

    public function getContenido(Request $request)
    {
        $nro = $request->nro;

        $contenido = "";
        $titulo = "";
        if (isset($this->listContenido[$nro]) && $this->listContenido[$nro]) {
            $data = $this->listContenido[$nro];
            $contenido = view("parcial.contenido." . $data["contenido"])->render();
            $titulo = $data["titulo"];
        }

        return response()->JSON([
            "titulo" => $titulo,
            "contenido" => $contenido,
        ]);
    }
}
