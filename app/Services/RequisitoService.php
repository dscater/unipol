<?php

namespace App\Services;

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

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "CREACIÓN", "REGISTRO UN USUARIO", $requisito);

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
        if ($requisito->archivo) {
            \File::delete(public_path("imgs/requisitos/" . $this->requisito->archivo));
        }

        $nombre = $nro . $requisito->id . time();
        $requisito['file' . $nro] = $this->cargarArchivoService->cargarArchivo($archivo, public_path("files/requisitos"), $nombre);
        $requisito->save();
    }
}
