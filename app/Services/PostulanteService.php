<?php

namespace App\Services;

use App\Mail\PreinscripcionMail;
use App\Services\HistorialAccionService;
use App\Models\Postulante;
use App\Models\PostulanteMaterial;
use App\Models\PostulanteOperario;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PostulanteService
{
    private $modulo = "POSTULANTE";

    public function __construct(private HistorialAccionService $historialAccionService, private EnviarCorreoService $enviarCorreoService) {}

    public function listado(): Collection
    {
        $postulantes = Postulante::select("postulantes.*")
            ->join("postulante_operarios", "postulante_operarios.postulante_id", "=", "postulantes.id");
        $postulantes->distinct("postulantes.id");
        $postulantes->groupBy("postulantes.id");
        $postulantes = $postulantes->get();
        return $postulantes;
    }

    public function listadoByCi($ci, $relaciones = []): Collection
    {
        $postulantes = Postulante::with($relaciones)->select("postulantes.*");
        $postulantes->where("ci", $ci);
        $postulantes = $postulantes->get();
        return $postulantes;
    }

    /**
     * Lista de users paginado con filtros
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
        $postulantes = Postulante::with(["user"])->select("postulantes.*");
        $postulantes->where("postulantes.status", 1);

        // Filtros exactos
        foreach ($columnsFilter as $key => $value) {
            if (!is_null($value)) {
                $postulantes->orWhere("postulantes.$key", $value);
            }
        }

        // Filtros por rango
        foreach ($columnsBetweenFilter as $key => $value) {
            if (isset($value[0], $value[1])) {
                $postulantes->whereBetween("postulantes.$key", $value);
            }
        }

        // Búsqueda en múltiples columnas con LIKE
        if (!empty($search) && !empty($columnsSerachLike)) {
            $postulantes->where(function ($query) use ($search, $columnsSerachLike) {
                foreach ($columnsSerachLike as $col) {
                    $query->orWhereRaw("$col LIKE ?", ["%{$search}%"]);
                }
            });
        }

        // Ordenamiento
        foreach ($orderBy as $value) {
            if (isset($value[0], $value[1])) {
                $postulantes->orderBy($value[0], $value[1]);
            }
        }


        $postulantes = $postulantes->paginate($length, ['*'], 'page', $page);
        return $postulantes;
    }

    /**
     * Crear postulante
     *
     * @param array $datos
     * @return Postulante
     */
    public function crear(array $datos): Postulante
    {
        $codigo = $this->getCodigoPreInsc($datos["unidad"]);

        // INICIAR USUARIO
        $user = User::create([
            "nombre" => mb_strtoupper($datos["nombre"]),
            "paterno" => mb_strtoupper($datos["paterno"]),
            "materno" => mb_strtoupper($datos["materno"]),
            "ci" => $datos["ci"],
            "ci_exp" => $datos["ci_exp"],
            "fono" => $datos["cel"],
            "correo" => $datos["correo"],
            "usuario" => $datos["correo"],
            "password" => $datos["ci"],
            "tipo" => "POSTULANTE",
            "acceso" => 0, // inicializar sin acceso
            "fecha_registro" => date("Y-m-d")
        ]);

        // REGISTRAR POSTULANTE
        $postulante = Postulante::create([
            "nombre" => mb_strtoupper($datos["nombre"]),
            "paterno" => mb_strtoupper($datos["paterno"]),
            "materno" => mb_strtoupper($datos["materno"]),
            "ci" => $datos["ci"],
            "ci_exp" => $datos["ci_exp"],
            "complemento" => mb_strtoupper($datos["complemento"]),
            "genero" => mb_strtoupper($datos["genero"]),
            "unidad" => $datos["unidad"],
            "fecha_nac" => $datos["fecha_nac"],
            "cel" => $datos["cel"],
            "correo" => $datos["correo"],
            "nro_cuenta" => $datos["nro_cuenta"],
            "lugar_preins" => mb_strtoupper($datos["lugar_preins"]),
            "observacion" => mb_strtoupper($datos["observacion"]),
            "nroPre" => $codigo[0],
            "codigoPre" => $codigo[1],
            "estado" => "PREINSCRITO",
            "fecha_registro" => date("Y-m-d"),
            "user_id" => $user->id,
        ]);


        // enviar mail
        $this->enviarCorreoService->mailPreinscripcion($postulante);

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "CREACIÓN", "REGISTRO UN POSTULANTE (PREINSCRIPCIÓN)", $postulante, null);

        return $postulante;
    }

    /**
     * Actualizar postulante
     *
     * @param array $datos
     * @param Postulante $postulante
     * @return Postulante
     */
    public function actualizar(array $datos, Postulante $postulante): Postulante
    {
        $old_postulante = clone $postulante;
        $postulante->update([
            "nombre" => mb_strtoupper($datos["nombre"]),
            "paterno" => mb_strtoupper($datos["paterno"]),
            "materno" => mb_strtoupper($datos["materno"]),
            "ci" => $datos["ci"],
            "ci_exp" => $datos["ci_exp"],
            "complemento" => mb_strtoupper($datos["complemento"]),
            "genero" => mb_strtoupper($datos["genero"]),
            "unidad" => $datos["unidad"],
            "fecha_nac" => $datos["fecha_nac"],
            "cel" => $datos["cel"],
            "correo" => $datos["correo"],
            "nro_cuenta" => $datos["nro_cuenta"],
            "lugar_preins" => mb_strtoupper($datos["lugar_preins"]),
            "observacion" => mb_strtoupper($datos["observacion"]),
        ]);

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "MODIFICACIÓN", "ACTUALIZÓ UN POSTULANTE", $old_postulante, $postulante);

        return $postulante;
    }

    /**
     * Eliminar postulante
     *
     * @param Postulante $postulante
     * @return boolean
     */
    public function eliminar(Postulante $postulante): bool
    {
        // verificar usos
        $usos = Postulante::where("postulante_id", $postulante->id)->get();
        if (count($usos) > 0) {
            throw ValidationException::withMessages([
                'error' =>  "No es posible eliminar este registro porque esta siendo utilizado por otros registros",
            ]);
        }
        $old_postulante = clone $postulante;
        $old_postulante->loadMissing(["postulante_materials", "postulante_operarios"]);
        $postulante->postulante_materials()->delete();
        $postulante->postulante_operarios()->delete();
        $postulante->delete();

        // registrar accion
        $this->historialAccionService->registrarAccion($this->modulo, "ELIMINACIÓN", "ELIMINÓ UN POSTULANTE", $old_postulante);

        return true;
    }

    private function getCodigoPreInsc($unidad)
    {

        $postulante = Postulante::where("unidad", $unidad)->orderBy("nroPre", "asc")->get()->last();
        $nroPre = 1;
        $codigo = substr($unidad, 0, 1);
        if ($postulante) {
            $nroPre = (int)$postulante->nroPre + 1;
        }

        if ($nroPre < 10) {
            $codigo = $codigo . '-000000' . $nroPre;
        } elseif ($nroPre < 100) {
            $codigo = $codigo . '-00000' . $nroPre;
        } elseif ($nroPre < 1000) {
            $codigo = $codigo . '-0000' . $nroPre;
        } elseif ($nroPre < 10000) {
            $codigo = $codigo . '-000' . $nroPre;
        } elseif ($nroPre < 100000) {
            $codigo = $codigo . '-00' . $nroPre;
        } elseif ($nroPre < 1000000) {
            $codigo = $codigo . '-0' . $nroPre;
        } else {
            $codigo = $codigo . '-' . $nroPre;
        }

        return [$nroPre, $codigo];
    }
}
