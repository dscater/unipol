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

        if (Auth::user()->tipo == 'OPERARIOS') {
            $postulantes->where("postulante_operarios.user_id", Auth::user()->id);
        }
        $postulantes->distinct("postulantes.id");
        $postulantes->groupBy("postulantes.id");
        $postulantes = $postulantes->get();
        return $postulantes;
    }

    public function listadoDataTable(int $length, int $start, int $page, string $search): LengthAwarePaginator
    {
        $postulantes = Postulante::with(["postulante", "producto", "supervisor", "postulante_materials", "postulante_operarios"])->select("postulantes.*")
            ->join("postulante_operarios", "postulante_operarios.postulante_id", "=", "postulantes.id");
        if ($search && trim($search) != '') {
            $postulantes->where("nombre", "LIKE", "%$search%");
        }
        if (Auth::user()->tipo == 'OPERARIOS') {
            $postulantes->where("postulante_operarios.user_id", Auth::user()->id);
        }
        $postulantes->distinct("postulantes.id");
        $postulantes->groupBy("postulantes.id");
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
            "nro_insc" => $codigo[0],
            "codigo" => $codigo[1],
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

        $postulante = Postulante::where("unidad", $unidad)->orderBy("nro_insc", "asc")->get()->last();
        $nro_insc = 1;
        $codigo = substr($unidad, 0, 1);
        if ($postulante) {
            $nro_insc = (int)$postulante->nro_insc;
        }

        if ($nro_insc < 10) {
            $codigo = $codigo . '-000000' . $nro_insc;
        } elseif ($nro_insc < 100) {
            $codigo = $codigo . '-00000' . $nro_insc;
        } elseif ($nro_insc < 1000) {
            $codigo = $codigo . '-0000' . $nro_insc;
        } elseif ($nro_insc < 10000) {
            $codigo = $codigo . '-000' . $nro_insc;
        } elseif ($nro_insc < 100000) {
            $codigo = $codigo . '-00' . $nro_insc;
        } elseif ($nro_insc < 1000000) {
            $codigo = $codigo . '-0' . $nro_insc;
        } else {
            $codigo = $codigo . '-' . $nro_insc;
        }

        return [$nro_insc, $codigo];
    }
}
