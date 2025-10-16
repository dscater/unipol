<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescargaDocumentoStoreRequest;
use App\Http\Requests\DescargaDocumentoUpdateRequest;
use App\Models\DescargaDocumento;
use App\Services\DescargaDocumentoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class DescargaDocumentoController extends Controller
{
    public function __construct(private DescargaDocumentoService $descarga_documentoService) {}

    /**
     * Página index
     *
     * @return Response
     */
    public function index(): InertiaResponse
    {
        return Inertia::render("Admin/DescargaDocumentos/Index");
    }

    /**
     * Listado de descarga_documentos
     *
     * @return JsonResponse
     */
    public function listado(): JsonResponse
    {
        return response()->JSON([
            "descarga_documentos" => $this->descarga_documentoService->listado()
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
            "CONCAT_WS(' ', ci, ci_exp, complemento)",
            "unidad"
        ];
        $columnsFilter = [];
        $columnsBetweenFilter = [];
        $arrayOrderBy = [];
        if ($orderByCol && $desc) {
            $arrayOrderBy = [
                [$orderByCol, $desc]
            ];
        }

        $descarga_documentos = $this->descarga_documentoService->listadoPaginado($perPage, $page, $search, $columnsSerachLike, $columnsFilter, $columnsBetweenFilter, $arrayOrderBy);
        return response()->JSON([
            "data" => $descarga_documentos->items(),
            "total" => $descarga_documentos->total(),
            "lastPage" => $descarga_documentos->lastPage()
        ]);
    }

    /**
     * Registrar un nuevo descarga_documento
     *
     * @param DescargaDocumentoStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(DescargaDocumentoStoreRequest $request): RedirectResponse|Response
    {
        DB::beginTransaction();
        try {
            // crear el DescargaDocumento
            $this->descarga_documentoService->crear($request->validated());
            DB::commit();
            return redirect()->route("descarga_documentos.preinscripcion")->with("bien", "Registro realizado");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Mostrar un descarga_documento
     *
     * @param DescargaDocumento $descarga_documento
     * @return JsonResponse
     */
    public function show(DescargaDocumento $descarga_documento): JsonResponse
    {
        return response()->JSON($descarga_documento->load(["area", "producto", "supervisor", "descarga_documento_materials.material", "descarga_documento_operarios.user"]));
    }

    public function update(DescargaDocumento $descarga_documento, DescargaDocumentoUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            // actualizar descarga_documento
            $this->descarga_documentoService->actualizar($request->validated(), $descarga_documento);
            DB::commit();
            return redirect()->route("descarga_documentos.index")->with("bien", "Registro actualizado");
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::debug($e->getMessage());
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }

    /**
     * Eliminar descarga_documento
     *
     * @param DescargaDocumento $descarga_documento
     * @return JsonResponse|Response
     */
    public function destroy(DescargaDocumento $descarga_documento): JsonResponse|Response
    {
        DB::beginTransaction();
        try {
            $this->descarga_documentoService->eliminar($descarga_documento);
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
