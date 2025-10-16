<?php

namespace App\Services;

use App\Models\DescargaDocumento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DescargaDocumentoService
{
    private $modulo = "DOCUMENTOS DE DESCARGA";

    public function __construct(private  CargarArchivoService $cargarArchivoService, private HistorialAccionService $historialAccionService) {}

    /**
     * Lista de descarga_documentos paginado con filtros
     *
     * @param integer $length
     * @param integer $page
     * @param string $search
     * @param array $columnsSerachLike
     * @param array $columnsFilter
     * @return LengthAwarePaginator
     */
    public function listadoPaginado(int $length, int $page, string $search, array $columnsSerachLike = [], array $columnsFilter = [], array $columnsBetweenFilter = [], array $orderBy = []): LengthAwarePaginator
    {
        $descarga_documentos = DescargaDocumento::select("descarga_documentos.*")->where("descarga_documentos.id", "!=", 1);
        $descarga_documentos->where("tipo", "!=", "POSTULANTE");
        $descarga_documentos->where("descarga_documentos.status", 1);

        // Filtros exactos
        foreach ($columnsFilter as $key => $value) {
            if (!is_null($value)) {
                $descarga_documentos->where("descarga_documentos.$key", $value);
            }
        }

        // Filtros por rango
        foreach ($columnsBetweenFilter as $key => $value) {
            if (isset($value[0], $value[1])) {
                $descarga_documentos->whereBetween("descarga_documentos.$key", $value);
            }
        }

        // Búsqueda en múltiples columnas con LIKE
        if (!empty($search) && !empty($columnsSerachLike)) {
            $descarga_documentos->where(function ($query) use ($search, $columnsSerachLike) {
                foreach ($columnsSerachLike as $col) {
                    $query->orWhere("$col", "LIKE", "%$search%");
                }
            });
        }

        // Ordenamiento
        foreach ($orderBy as $value) {
            if (isset($value[0], $value[1])) {
                $descarga_documentos->orderBy($value[0], $value[1]);
            }
        }


        $descarga_documentos = $descarga_documentos->paginate($length, ['*'], 'page', $page);
        return $descarga_documentos;
    }


    /**
     * Crear descarga_documento
     *
     * @param array $datos
     * @return DescargaDocumento
     */
    public function crear(array $datos): DescargaDocumento
    {
        $descarga_documento = DescargaDocumento::create([
            "descripcion" => mb_strtoupper($datos["descripcion"]),
        ]);

        // cargar documento
        $this->cargarDocumento($descarga_documento, $datos["documento"]);

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "CREACIÓN", "REGISTRO UN DOCUMENTO DE DESCARGA", $descarga_documento);

        return $descarga_documento;
    }

    /**
     * Actualizar descarga_documento
     *
     * @param array $datos
     * @param DescargaDocumento $descarga_documento
     * @return DescargaDocumento
     */
    public function actualizar(array $datos, DescargaDocumento $descarga_documento): DescargaDocumento
    {
        $old_descarga_documento = clone $descarga_documento;
        $descarga_documento->update([
            "descripcion" => mb_strtoupper($datos["descripcion"]),
        ]);

        // cargar documento
        if ($datos["documento"] && !is_string($datos["documento"])) {
            $this->cargarDocumento($descarga_documento, $datos["documento"]);
        }

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "MODIFICACIÓN", "ACTUALIZÓ UN DOCUMENTO DE DESCARGA", $old_descarga_documento, $descarga_documento->withoutRelations());

        return $descarga_documento;
    }

    /**
     * Cargar documento
     *
     * @param DescargaDocumento $descarga_documento
     * @param UploadedFile $documento
     * @return void
     */
    public function cargarDocumento(DescargaDocumento $descarga_documento, UploadedFile $documento): void
    {
        if ($descarga_documento->documento) {
            \File::delete(public_path("files/descarga_documentos/" . $this->descarga_documento->documento));
        }

        $nombre = $descarga_documento->id . time();
        $descarga_documento->documento = $this->cargarArchivoService->cargarArchivo($documento, public_path("files/descarga_documentos"), $nombre);
        $descarga_documento->save();
    }

    /**
     * Eliminar descarga_documento
     *
     * @param DescargaDocumento $descarga_documento
     * @return boolean
     */
    public function eliminar(DescargaDocumento $descarga_documento): bool
    {
        // no eliminar descarga_documentos predeterminados para el funcionamiento del sistema
        $old_descarga_documento = DescargaDocumento::find($descarga_documento->id);
        $descarga_documento->status = 0;
        $descarga_documento->save();

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "ELIMINACIÓN", "ELIMINÓ AL USUARIO " . $old_descarga_documento->descarga_documento, $old_descarga_documento, $descarga_documento);
        return true;
    }
}
