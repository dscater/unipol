<?php

use App\Http\Controllers\AnapolController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\DescargaDocumentoController;
use App\Http\Controllers\EsbapolmusController;
use App\Http\Controllers\EvaluacionConocimientoController;
use App\Http\Controllers\EvaluacionFisicaController;
use App\Http\Controllers\EvaluacionInstruccionController;
use App\Http\Controllers\EvaluacionMedicaController;
use App\Http\Controllers\EvaluacionOdontologicaController;
use App\Http\Controllers\EvaluacionPsicologicaController;
use App\Http\Controllers\FatescipolController;
use App\Http\Controllers\FormularioRegistroController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RequisitoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VerificaCodigoVerificacionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PortalController::class, 'index'])->name("portal.index");

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('optimize');
    return 'Cache eliminado <a href="/">Ir al inicio</a>';
})->name('clear.cache');

Route::get("configuracions/getConfiguracion", [ConfiguracionController::class, 'getConfiguracion'])->name("configuracions.getConfiguracion");

// ** Verificar codigo verificacion LOGIN
Route::post("verificarCodigo/{user}", [VerificaCodigoVerificacionController::class, 'verificarCodigo'])->name("codigoVerificacion.verificarCodigo");

// ** Formulario de Registro
Route::post("formularioRegistro/{postulante}", [FormularioRegistroController::class, 'store'])->name("formularioRegistro.store");
Route::get("formularioRegistro/{postulante}", [FormularioRegistroController::class, 'index'])->name("formularioRegistro.index");

// ** Formulario Correo y Contraseña
Route::get("formularioRegistro/registro/{postulante}", [FormularioRegistroController::class, 'registro'])->name("formularioRegistro.registro");
Route::put("formularioRegistro/registro/{postulante}", [FormularioRegistroController::class, 'update'])->name("formularioRegistro.update");

// PORTAL

// ** ANAPOL
Route::get("anapol", [AnapolController::class, 'index'])->name("anapol");
Route::get("anapol/nuestra_academia", [AnapolController::class, 'nuestra_academia'])->name("anapol.nuestra_academia");
Route::get("anapol/requisitos", [AnapolController::class, 'requisitos'])->name("anapol.requisitos");
Route::get("anapol/fase_convocatoria", [AnapolController::class, 'fase_convocatoria'])->name("anapol.fase_convocatoria");
Route::get("anapol/fase_seleccion", [AnapolController::class, 'fase_seleccion'])->name("anapol.fase_seleccion");
Route::get("anapol/fase_incorporacion", [AnapolController::class, 'fase_incorporacion'])->name("anapol.fase_incorporacion");
Route::get("anapol/comunicados", [AnapolController::class, 'comunicados'])->name("anapol.comunicados");
Route::get("anapol/getComunicados", [AnapolController::class, 'getComunicados'])->name("anapol.getComunicados");
Route::get("anapol/contactos", [AnapolController::class, 'contactos'])->name("anapol.contactos");
Route::get("anapol/antecedentes", [AnapolController::class, 'antecedentes'])->name("anapol.antecedentes");
Route::get("anapol/evaluacion_medica", [AnapolController::class, 'evaluacion_medica'])->name("anapol.evaluacion_medica");

// ** FATESCIPOL
Route::get("fatescipol", [FatescipolController::class, 'index'])->name("fatescipol");
Route::get("fatescipol/nuestra_academia", [FatescipolController::class, 'nuestra_academia'])->name("fatescipol.nuestra_academia");
Route::get("fatescipol/requisitos", [FatescipolController::class, 'requisitos'])->name("fatescipol.requisitos");
Route::get("fatescipol/fase_convocatoria", [FatescipolController::class, 'fase_convocatoria'])->name("fatescipol.fase_convocatoria");
Route::get("fatescipol/fase_seleccion", [FatescipolController::class, 'fase_seleccion'])->name("fatescipol.fase_seleccion");
Route::get("fatescipol/fase_incorporacion", [FatescipolController::class, 'fase_incorporacion'])->name("fatescipol.fase_incorporacion");
Route::get("fatescipol/comunicados", [FatescipolController::class, 'comunicados'])->name("fatescipol.comunicados");
Route::get("fatescipol/getComunicados", [FatescipolController::class, 'getComunicados'])->name("fatescipol.getComunicados");
Route::get("fatescipol/contactos", [FatescipolController::class, 'contactos'])->name("fatescipol.contactos");
Route::get("fatescipol/antecedentes", [FatescipolController::class, 'antecedentes'])->name("fatescipol.antecedentes");
Route::get("fatescipol/evaluacion_medica", [FatescipolController::class, 'evaluacion_medica'])->name("fatescipol.evaluacion_medica");

// ** ESBAPOLMUS
Route::get("esbapolmus", [EsbapolmusController::class, 'index'])->name("esbapolmus");
Route::get("esbapolmus/nuestra_academia", [EsbapolmusController::class, 'nuestra_academia'])->name("esbapolmus.nuestra_academia");
Route::get("esbapolmus/requisitos", [EsbapolmusController::class, 'requisitos'])->name("esbapolmus.requisitos");
Route::get("esbapolmus/fase_convocatoria", [EsbapolmusController::class, 'fase_convocatoria'])->name("esbapolmus.fase_convocatoria");
Route::get("esbapolmus/fase_seleccion", [EsbapolmusController::class, 'fase_seleccion'])->name("esbapolmus.fase_seleccion");
Route::get("esbapolmus/fase_incorporacion", [EsbapolmusController::class, 'fase_incorporacion'])->name("esbapolmus.fase_incorporacion");
Route::get("esbapolmus/comunicados", [EsbapolmusController::class, 'comunicados'])->name("esbapolmus.comunicados");
Route::get("esbapolmus/getComunicados", [EsbapolmusController::class, 'getComunicados'])->name("esbapolmus.getComunicados");
Route::get("esbapolmus/contactos", [EsbapolmusController::class, 'contactos'])->name("esbapolmus.contactos");
Route::get("esbapolmus/antecedentes", [EsbapolmusController::class, 'antecedentes'])->name("esbapolmus.antecedentes");
Route::get("esbapolmus/evaluacion_medica", [EsbapolmusController::class, 'evaluacion_medica'])->name("esbapolmus.evaluacion_medica");

// ADMINISTRACION
Route::middleware(['auth', 'permisoUsuario'])->prefix("admin")->group(function () {
    // INICIO
    Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');

    // CONFIGURACION
    Route::resource("configuracions", ConfiguracionController::class)->only(
        ["index", "show", "update"]
    );

    // USUARIO
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/update_foto', [ProfileController::class, 'update_foto'])->name('profile.update_foto');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("getUser", [UserController::class, 'getUser'])->name('users.getUser');
    Route::get("permisosUsuario", [UserController::class, 'permisosUsuario']);

    // USUARIOS
    Route::put("usuarios/password/{user}", [UsuarioController::class, 'actualizaPassword'])->name("usuarios.password");
    Route::get("usuarios/api", [UsuarioController::class, 'api'])->name("usuarios.api");
    Route::get("usuarios/paginado", [UsuarioController::class, 'paginado'])->name("usuarios.paginado");
    Route::get("usuarios/listado", [UsuarioController::class, 'listado'])->name("usuarios.listado");
    Route::get("usuarios/listado/byTipo", [UsuarioController::class, 'byTipo'])->name("usuarios.byTipo");
    Route::get("usuarios/show/{user}", [UsuarioController::class, 'show'])->name("usuarios.show");
    Route::put("usuarios/update/{user}", [UsuarioController::class, 'update'])->name("usuarios.update");
    Route::delete("usuarios/{user}", [UsuarioController::class, 'destroy'])->name("usuarios.destroy");
    Route::resource("usuarios", UsuarioController::class)->only(
        ["index", "store"]
    );

    // POSTULANTE
    Route::get('/evaluaciones', [InicioController::class, 'evaluaciones'])->name('evaluaciones');
    Route::get('/vestibulares', [InicioController::class, 'vestibulares'])->name('vestibulares');

    // POSTULANTES
    Route::get("postulantes/preinscripcion", [PostulanteController::class, 'preinscripcion'])->name("postulantes.preinscripcion");
    Route::get("postulantes/api", [PostulanteController::class, 'api'])->name("postulantes.api");
    Route::get("postulantes/paginado", [PostulanteController::class, 'paginado'])->name("postulantes.paginado");
    Route::get("postulantes/listado", [PostulanteController::class, 'listado'])->name("postulantes.listado");
    Route::get("postulantes/listadoByCi", [PostulanteController::class, 'listadoByCi'])->name("postulantes.listadoByCi");
    Route::resource("postulantes", PostulanteController::class)->only(
        ["index", "store", "edit", "show", "update", "destroy"]
    );

    // DESCARGA DOCUMENTOS
    Route::get("descarga_documentos/api", [DescargaDocumentoController::class, 'api'])->name("descarga_documentos.api");
    Route::get("descarga_documentos/paginado", [DescargaDocumentoController::class, 'paginado'])->name("descarga_documentos.paginado");
    Route::get("descarga_documentos/listado", [DescargaDocumentoController::class, 'listado'])->name("descarga_documentos.listado");
    Route::resource("descarga_documentos", DescargaDocumentoController::class)->only(
        ["index", "store", "edit", "show", "update", "destroy"]
    );

    // COMUNICADOS
    Route::get("comunicados/api", [ComunicadoController::class, 'api'])->name("comunicados.api");
    Route::get("comunicados/paginado", [ComunicadoController::class, 'paginado'])->name("comunicados.paginado");
    Route::get("comunicados/listado", [ComunicadoController::class, 'listado'])->name("comunicados.listado");
    Route::resource("comunicados", ComunicadoController::class)->only(
        ["index", "store", "edit", "show", "update", "destroy"]
    );

    // INSCRIPCION
    Route::get("inscripcions", [InscripcionController::class, 'index'])->name("inscripcions.index");

    // REQUISITOS
    Route::get("requisitos/buscar", [RequisitoController::class, 'buscar'])->name("requisitos.buscar");
    Route::post("requisitos/store", [RequisitoController::class, 'store'])->name("requisitos.store");
    Route::put("requisitos/update/{requisito}", [RequisitoController::class, 'update'])->name("requisitos.update");
    Route::patch("requisitos/aprobarInscripcion/{postulante}", [RequisitoController::class, 'aprobarInscripcion'])->name("requisitos.aprobarInscripcion");

    // CONTENIDO
    Route::get("contenidos/getContenido", [ContenidoController::class, 'getContenido'])->name("contenidos.getContenido");

    // EVALUACION MEDICAS
    Route::get("evaluacion_medicas/index", [EvaluacionMedicaController::class, 'index'])->name("evaluacion_medicas.index");
    Route::get("evaluacion_medicas/descargar", [EvaluacionMedicaController::class, 'descargar'])->name("evaluacion_medicas.descargar");
    Route::post("evaluacion_medicas/subir", [EvaluacionMedicaController::class, 'subir'])->name("evaluacion_medicas.subir");
    Route::get("evaluacion_medicas/paginado", [EvaluacionMedicaController::class, 'paginado'])->name("evaluacion_medicas.paginado");

    // EVALUACION PSICOLOGICA
    Route::get("evaluacion_psicologicas/index", [EvaluacionPsicologicaController::class, 'index'])->name("evaluacion_psicologicas.index");
    Route::get("evaluacion_psicologicas/descargar", [EvaluacionPsicologicaController::class, 'descargar'])->name("evaluacion_psicologicas.descargar");
    Route::post("evaluacion_psicologicas/subir", [EvaluacionPsicologicaController::class, 'subir'])->name("evaluacion_psicologicas.subir");
    Route::get("evaluacion_psicologicas/paginado", [EvaluacionPsicologicaController::class, 'paginado'])->name("evaluacion_psicologicas.paginado");

    // EVALUACION FISICA
    Route::get("evaluacion_fisicas/index", [EvaluacionFisicaController::class, 'index'])->name("evaluacion_fisicas.index");
    Route::get("evaluacion_fisicas/descargar", [EvaluacionFisicaController::class, 'descargar'])->name("evaluacion_fisicas.descargar");
    Route::post("evaluacion_fisicas/subir", [EvaluacionFisicaController::class, 'subir'])->name("evaluacion_fisicas.subir");
    Route::get("evaluacion_fisicas/paginado", [EvaluacionFisicaController::class, 'paginado'])->name("evaluacion_fisicas.paginado");

    // EVALUACION INSTRUCCION
    Route::get("evaluacion_instruccions/index", [EvaluacionInstruccionController::class, 'index'])->name("evaluacion_instruccions.index");
    Route::get("evaluacion_instruccions/descargar", [EvaluacionInstruccionController::class, 'descargar'])->name("evaluacion_instruccions.descargar");
    Route::post("evaluacion_instruccions/subir", [EvaluacionInstruccionController::class, 'subir'])->name("evaluacion_instruccions.subir");
    Route::get("evaluacion_instruccions/paginado", [EvaluacionInstruccionController::class, 'paginado'])->name("evaluacion_instruccions.paginado");

    // EVALUACION CONOCIMIENTO
    Route::get("evaluacion_conocimientos/index", [EvaluacionConocimientoController::class, 'index'])->name("evaluacion_conocimientos.index");
    Route::get("evaluacion_conocimientos/descargar", [EvaluacionConocimientoController::class, 'descargar'])->name("evaluacion_conocimientos.descargar");
    Route::post("evaluacion_conocimientos/subir", [EvaluacionConocimientoController::class, 'subir'])->name("evaluacion_conocimientos.subir");
    Route::get("evaluacion_conocimientos/paginado", [EvaluacionConocimientoController::class, 'paginado'])->name("evaluacion_conocimientos.paginado");

    // EVALUACION ODONTOLOGICA
    Route::get("evaluacion_odontologicas/index", [EvaluacionOdontologicaController::class, 'index'])->name("evaluacion_odontologicas.index");
    Route::get("evaluacion_odontologicas/descargar", [EvaluacionOdontologicaController::class, 'descargar'])->name("evaluacion_odontologicas.descargar");
    Route::post("evaluacion_odontologicas/subir", [EvaluacionOdontologicaController::class, 'subir'])->name("evaluacion_odontologicas.subir");
    Route::get("evaluacion_odontologicas/paginado", [EvaluacionOdontologicaController::class, 'paginado'])->name("evaluacion_odontologicas.paginado");

    // REPORTES
    Route::get('reportes/usuarios', [ReporteController::class, 'usuarios'])->name("reportes.usuarios");
    Route::get('reportes/r_usuarios', [ReporteController::class, 'r_usuarios'])->name("reportes.r_usuarios");

    Route::get('reportes/postulantes', [ReporteController::class, 'postulantes'])->name("reportes.postulantes");
    Route::get('reportes/r_postulantes', [ReporteController::class, 'r_postulantes'])->name("reportes.r_postulantes");
});
require __DIR__ . '/auth.php';
