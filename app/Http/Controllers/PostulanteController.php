<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulanteStoreRequest;
use App\Http\Requests\PostulanteUpdateRequest;
use App\Models\Postulante;
use App\Services\PostulanteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PostulanteController extends Controller
{
    public function __construct(private PostulanteService $postulanteService) {}

    /**
     * Página index
     *
     * @return Response
     */
    public function index(): InertiaResponse
    {
        return Inertia::render("Admin/Postulantes/Index");
    }

    /**
     * Página preinscripcion
     *
     * @return Response
     */
    public function preinscripcion(): InertiaResponse
    {
        return Inertia::render("Admin/Postulantes/Preinscripcion");
    }

    /**
     * Listado de postulantes
     *
     * @return JsonResponse
     */
    public function listado(): JsonResponse
    {
        return response()->JSON([
            "postulantes" => $this->postulanteService->listado()
        ]);
    }

    /**
     * Listado de postulantes para portal
     *
     * @return JsonResponse
     */
    public function listadoPortal(): JsonResponse
    {
        return response()->JSON([
            "postulantes" => $this->postulanteService->listado()
        ]);
    }

    /**
     * Endpoint para obtener la lista de postulantes paginado para datatable
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {

        $length = (int)$request->input('length', 10); // Valor de `length` enviado por DataTable
        $start = (int)$request->input('start', 0); // Índice de inicio enviado por DataTable
        $page = (int)(($start / $length) + 1); // Cálculo de la página actual
        $search = (string)$request->input('search', '');

        $usuarios = $this->postulanteService->listadoDataTable($length, $start, $page, $search);

        return response()->JSON([
            'data' => $usuarios->items(),
            'recordsTotal' => $usuarios->total(),
            'recordsFiltered' => $usuarios->total(),
            'draw' => intval($request->input('draw')),
        ]);
    }

    /**
     * Registrar un nuevo postulante
     *
     * @param PostulanteStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(PostulanteStoreRequest $request): RedirectResponse|Response
    {
        DB::beginTransaction();
        try {
            // crear el Postulante
            $this->postulanteService->crear($request->validated());
            DB::commit();
            return redirect()->route("postulantes.preinscripcion")->with("bien", "Registro realizado");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Mostrar un postulante
     *
     * @param Postulante $postulante
     * @return JsonResponse
     */
    public function show(Postulante $postulante): JsonResponse
    {
        return response()->JSON($postulante->load(["area", "producto", "supervisor", "postulante_materials.material", "postulante_operarios.user"]));
    }

    public function update(Postulante $postulante, PostulanteUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            // actualizar postulante
            $this->postulanteService->actualizar($request->validated(), $postulante);
            DB::commit();
            return redirect()->route("postulantes.index")->with("bien", "Registro actualizado");
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::debug($e->getMessage());
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Eliminar postulante
     *
     * @param Postulante $postulante
     * @return JsonResponse|Response
     */
    public function destroy(Postulante $postulante): JsonResponse|Response
    {
        DB::beginTransaction();
        try {
            $this->postulanteService->eliminar($postulante);
            DB::commit();
            return response()->JSON([
                'sw' => true,
                'message' => 'El registro se eliminó correctamente'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }
}
