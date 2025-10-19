<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunicadoStoreRequest;
use App\Http\Requests\ComunicadoUpdateRequest;
use App\Models\Comunicado;
use App\Services\ComunicadoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ComunicadoController extends Controller
{
    public function __construct(private ComunicadoService $comunicadoService) {}

    /**
     * Página index
     *
     * @return Response
     */
    public function index(): InertiaResponse
    {
        return Inertia::render("Admin/Comunicados/Index");
    }

    /**
     * Listado de comunicados
     *
     * @return JsonResponse
     */
    public function listado(): JsonResponse
    {
        return response()->JSON([
            "comunicados" => $this->comunicadoService->listado()
        ]);
    }

    public function paginado(Request $request)
    {
        $perPage = $request->perPage;
        $page = (int)($request->input("page", 1));
        $search = (string)$request->input("search", "");
        $orderByCol = $request->orderByCol;
        $desc = $request->desc;

        $columnsSerachLike = [
            "descripcion"
        ];
        $columnsFilter = [];
        $columnsBetweenFilter = [];
        $arrayOrderBy = [];
        if ($orderByCol && $desc) {
            $arrayOrderBy = [
                [$orderByCol, $desc]
            ];
        }

        $comunicados = $this->comunicadoService->listadoPaginado($perPage, $page, $search, $columnsSerachLike, $columnsFilter, $columnsBetweenFilter, $arrayOrderBy);
        return response()->JSON([
            "data" => $comunicados->items(),
            "total" => $comunicados->total(),
            "lastPage" => $comunicados->lastPage()
        ]);
    }

    /**
     * Registrar un nuevo comunicado
     *
     * @param ComunicadoStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(ComunicadoStoreRequest $request): RedirectResponse|Response
    {
        DB::beginTransaction();
        try {
            // crear el Comunicado
            $this->comunicadoService->crear($request->validated());
            DB::commit();
            return redirect()->route("comunicados.index")->with("bien", "Registro realizado");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Mostrar un comunicado
     *
     * @param Comunicado $comunicado
     * @return JsonResponse
     */
    public function show(Comunicado $comunicado): JsonResponse
    {
        return response()->JSON($comunicado);
    }

    public function update(Comunicado $comunicado, ComunicadoUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            // actualizar comunicado
            $this->comunicadoService->actualizar($request->validated(), $comunicado);
            DB::commit();
            return redirect()->route("comunicados.index")->with("bien", "Registro actualizado");
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::debug($e->getMessage());
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Eliminar comunicado
     *
     * @param Comunicado $comunicado
     * @return JsonResponse|Response
     */
    public function destroy(Comunicado $comunicado): JsonResponse|Response
    {
        DB::beginTransaction();
        try {
            $this->comunicadoService->eliminar($comunicado);
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
