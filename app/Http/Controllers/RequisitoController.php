<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitoStoreRequest;
use App\Http\Requests\RequisitoUpdateRequest;
use App\Models\Postulante;
use App\Models\Requisito;
use App\Services\RequisitoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class RequisitoController extends Controller
{
    public function __construct(private RequisitoService $requisitoService) {}

    public function buscar()
    {
        return Inertia::render("Admin/Requisitos/Buscar");
    }

    /**
     * Store requisito
     *
     * @param RequisitoStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(RequisitoStoreRequest $request): RedirectResponse|Response
    {
        DB::beginTransaction();
        try {
            $requisito = $this->requisitoService->crear($request->validated());
            DB::commit();
            return redirect()->route("inicio")->with("bien", "Registro realizado")->with("codigoInsc", $requisito->postulante->codigoInsc);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Update requisito
     *
     * @param RequisitoUpdateRequest $request
     * @return RedirectResponse|Response
     */
    public function update(RequisitoUpdateRequest $request, Requisito $requisito): RedirectResponse|Response
    {
        DB::beginTransaction();
        try {
            $this->requisitoService->actualizar($request->validated(), $requisito);
            DB::commit();
            return redirect()->route("requisitos.buscar")->with("bien", "Actualización correcta")->with("codigoInsc", $requisito->postulante->codigoInsc);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    public function aprobarInscripcion(Postulante $postulante)
    {
        DB::beginTransaction();
        try {
            $postulante->estado = "INSCRITO";
            $postulante->save();
            DB::commit();
            return response()->JSON([
                "postulante" => $postulante,
                "sw" => true
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }
}
