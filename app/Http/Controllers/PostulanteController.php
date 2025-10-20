<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulanteStoreRequest;
use App\Http\Requests\PostulanteUpdateRequest;
use App\Models\Postulante;
use App\Services\PostulanteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
     * Listado de postulantes
     *
     * @return JsonResponse
     */
    public function listadoByCi(Request $request): JsonResponse
    {
        $ci = trim($request->input("ci"));
        return response()->JSON([
            "postulantes" =>  $ci ? $this->postulanteService->listadoByCi($ci, ["requisito"]) : []
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
            "CONCAT_WS(' ', nombre, paterno, materno)",
            "CONCAT_WS(' ', ci, complemento,ci_exp)",
            "unidad",
            "estado"
        ];
        $columnsFilter = [];
        $columnsBetweenFilter = [];
        $arrayOrderBy = [];
        if ($orderByCol && $desc) {
            $arrayOrderBy = [
                [$orderByCol, $desc]
            ];
        }

        $postulantes = $this->postulanteService->listadoPaginado($perPage, $page, $search, $columnsSerachLike, $columnsFilter, $columnsBetweenFilter, $arrayOrderBy);
        return response()->JSON([
            "data" => $postulantes->items(),
            "total" => $postulantes->total(),
            "lastPage" => $postulantes->lastPage()
        ]);
    }

    /**
     * Registrar un nuevo postulante
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request): RedirectResponse|Response
    {
        try {
            return Cache::lock("postulanteStore")->block(10, function () use ($request) {
                // Validamos usando el Form Request
                $validated = app(PostulanteStoreRequest::class)->validated();
                DB::beginTransaction();
                try {
                    $this->postulanteService->crear($validated);
                    DB::commit();
                    return redirect()->route("postulantes.preinscripcion")
                        ->with("bien", "Registro realizado");
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->withErrors(['error' => $e->getMessage()]);
                }
            });
        } catch (ValidationException $ve) {
            // Si falla la validación fuera del lock
            return back()->withErrors($ve->errors());
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
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
        return response()->JSON($postulante->load(["requisito"]));
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
