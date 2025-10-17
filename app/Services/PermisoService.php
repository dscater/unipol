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

            "evaluacion_medicas.index",
            "evaluacion_medicas.descargar",
            "evaluacion_medicas.subir",

            "evaluacion_psicologicas.index",
            "evaluacion_psicologicas.descargar",
            "evaluacion_psicologicas.subir",

            "evaluacion_fisicas.index",
            "evaluacion_fisicas.descargar",
            "evaluacion_fisicas.subir",

            "evaluacion_instruccions.index",
            "evaluacion_instruccions.descargar",
            "evaluacion_instruccions.subir",

            "evaluacion_conocimientos.index",
            "evaluacion_conocimientos.descargar",
            "evaluacion_conocimientos.subir",

            "evaluacion_odontologicas.index",
            "evaluacion_odontologicas.descargar",
            "evaluacion_odontologicas.subir",

            "requisitos.buscar",
            "requisitos.update",
            "requisitos.aprobarInscripcion",

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

            "evaluaciones",
            "vestibulares",

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
