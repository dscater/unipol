<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class PermisoService
{
    protected $arrayPermisos = [
        "ADMINISTRADOR" => [
            "usuarios.paginado",
            "usuarios.index",
            "usuarios.listado",
            "usuarios.create",
            "usuarios.store",
            "usuarios.edit",
            "usuarios.show",
            "usuarios.update",
            "usuarios.destroy",
            "usuarios.password",
            "usuarios.eliminados",

            "postulantes.preinscripcion",
            "postulantes.paginado",
            "postulantes.listado",
            "postulantes.listadoByCi",
            "postulantes.index",
            "postulantes.create",
            "postulantes.store",
            "postulantes.edit",
            "postulantes.show",
            "postulantes.update",
            "postulantes.destroy",

            "descarga_documentos.paginado",
            "descarga_documentos.listado",
            "descarga_documentos.index",
            "descarga_documentos.create",
            "descarga_documentos.store",
            "descarga_documentos.edit",
            "descarga_documentos.show",
            "descarga_documentos.update",
            "descarga_documentos.destroy",

            "requisitos.buscar",
            "requisitos.update",

            "configuracions.index",
            "configuracions.create",
            "configuracions.edit",
            "configuracions.update",
            "configuracions.destroy",

            "reportes.usuarios",
            "reportes.r_usuarios",
        ],
        "POSTULANTE" => [
            "inscripcions.index",

            "requisitos.store",

            "contenidos.getContenido"
        ],
    ];

    public function getPermisosUser()
    {
        $user = Auth::user();
        $permisos = [];
        if ($user) {
            return $this->arrayPermisos[$user->tipo];
        }

        return $permisos;
    }
}
