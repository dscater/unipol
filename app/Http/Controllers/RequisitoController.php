<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitoStoreRequest;
use App\Services\RequisitoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RequisitoController extends Controller
{
    public function __construct(private RequisitoService $requisitoService) {}
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
            $this->requisitoService->crear($request->validated());
            DB::commit();
            return redirect()->route("inicio")->with("bien", "Registro realizado");
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }
}
