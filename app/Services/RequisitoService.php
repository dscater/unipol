<?php

namespace App\Services;

use App\Models\Postulante;
use App\Models\Requisito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RequisitoService
{
    private $modulo = "REQUISITOS";

    public function __construct(private  CargarArchivoService $cargarArchivoService, private HistorialAccionService $historialAccionService) {}

    /**
     * Crear requisito
     *
     * @param array $datos
     * @return Requisito
     */
    public function crear(array $datos): Requisito
    {
        // cargar archivos
        $user = Auth::user();
        $requisito = Requisito::create([
            "user_id" => $user->id,
            "postulante_id" => $user->postulante->id,
        ]);

        $this->cargarArchivo($requisito, $datos["file1"], 1);
        $this->cargarArchivo($requisito, $datos["file2"], 2);
        $this->cargarArchivo($requisito, $datos["file3"], 3);
        $this->cargarArchivo($requisito, $datos["file4"], 4);
        if ($user->postulante->genero == 'F') {
            $this->cargarArchivo($requisito, $datos["file5"], 5);
        }
        $this->cargarArchivo($requisito, $datos["file6"], 6);
        $this->cargarArchivo($requisito, $datos["file7"], 7);
        $this->cargarArchivo($requisito, $datos["file8"], 8);
        $this->cargarArchivo($requisito, $datos["file9"], 9);
        $this->cargarArchivo($requisito, $datos["file10"], 10);
        $this->cargarArchivo($requisito, $datos["file11"], 11);
        $this->cargarArchivo($requisito, $datos["file12"], 12);
        $this->cargarArchivo($requisito, $datos["file13"], 13);
        $this->cargarArchivo($requisito, $datos["file14"], 14);

        // ACTUALIZAR POSTULANTE
        $postulante = $user->postulante;
        $codigo = $this->getCodigoInsc($postulante->unidad);
        $postulante->nroInsc = $codigo[0];
        $postulante->codigoInsc = $codigo[1];
        $postulante->save();
        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "CREACIÓN", "REGISTRO UN USUARIO", $requisito);

        return $requisito;
    }

    /**
     * actualizar requisito
     *
     * @param array $datos
     * @return Requisito
     */
    public function actualizar(array $datos, Requisito $requisito): Requisito
    {
        $old_requisito = clone $requisito;
        // cargar archivos
        $user = $requisito->postulante->user;
        if ($datos["file1"]) {
            $this->cargarArchivo($requisito, $datos["file1"], 1);
        }
        if ($datos["file2"]) {
            $this->cargarArchivo($requisito, $datos["file2"], 2);
        }
        if ($datos["file3"]) {
            $this->cargarArchivo($requisito, $datos["file3"], 3);
        }
        if ($datos["file4"]) {
            $this->cargarArchivo($requisito, $datos["file4"], 4);
        }
        if ($user->postulante->genero == 'F') {
            if ($datos["file5"]) {
                $this->cargarArchivo($requisito, $datos["file5"], 5);
            }
        }
        if ($datos["file6"]) {
            $this->cargarArchivo($requisito, $datos["file6"], 6);
        }
        if ($datos["file7"]) {
            $this->cargarArchivo($requisito, $datos["file7"], 7);
        }
        if ($datos["file8"]) {
            $this->cargarArchivo($requisito, $datos["file8"], 8);
        }
        if ($datos["file9"]) {
            $this->cargarArchivo($requisito, $datos["file9"], 9);
        }
        if ($datos["file10"]) {
            $this->cargarArchivo($requisito, $datos["file10"], 10);
        }
        if ($datos["file11"]) {
            $this->cargarArchivo($requisito, $datos["file11"], 11);
        }
        if ($datos["file12"]) {
            $this->cargarArchivo($requisito, $datos["file12"], 12);
        }
        if ($datos["file13"]) {
            $this->cargarArchivo($requisito, $datos["file13"], 13);
        }
        if ($datos["file14"]) {
            $this->cargarArchivo($requisito, $datos["file14"], 14);
        }

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "MODIFICACIÓN", "MODIFICÓ UN ARCHIVO(S) DE UN REQUISITO", $old_requisito, $requisito);

        return $requisito;
    }

    /**
     * Cargar archivo
     *
     * @param Requisito $requisito
     * @param UploadedFile $archivo
     * @return void
     */
    public function cargarArchivo(Requisito $requisito, UploadedFile $archivo, $nro): void
    {
        if ($requisito['file' . $nro]) {
            \File::delete(public_path("imgs/requisitos/" . $requisito["file" . $nro]));
        }

        $nombre = $nro . $requisito->id . time();
        $requisito['file' . $nro] = $this->cargarArchivoService->cargarArchivo($archivo, public_path("files/requisitos"), $nombre);
        $requisito->save();
    }

    private function getCodigoInsc($unidad)
    {

        $postulante = Postulante::where("unidad", $unidad)->orderBy("nroInsc", "asc")->get()->last();
        $nroInsc = 1;
        $codigo = substr($unidad, 0, 3);
        if ($postulante) {
            $nroInsc = (int)$postulante->nroInsc + 1;
        }

        do {
            if ($nroInsc < 10) {
                $codigo = $codigo . '_2026-00000' . $nroInsc;
            } elseif ($nroInsc < 100) {
                $codigo = $codigo . '_2026-0000' . $nroInsc;
            } elseif ($nroInsc < 1000) {
                $codigo = $codigo . '_2026-000' . $nroInsc;
            } elseif ($nroInsc < 10000) {
                $codigo = $codigo . '_2026-00' . $nroInsc;
            } elseif ($nroInsc < 100000) {
                $codigo = $codigo . '_2026-0' . $nroInsc;
            } else {
                $codigo = $codigo . '-' . $nroInsc;
            }
            $existe = Postulante::where("codigoInsc", $codigo)->get()->first();
        } while ($existe);

        return [$nroInsc, $codigo];
    }
}
