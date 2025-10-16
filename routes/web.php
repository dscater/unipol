<?php

use App\Http\Controllers\AnapolController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\EsbapolmusController;
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
Route::get("anapol/contactos", [AnapolController::class, 'contactos'])->name("anapol.contactos");

// ** FATESCIPOL
Route::get("fatescipol", [FatescipolController::class, 'index'])->name("fatescipol");
Route::get("fatescipol/nuestra_academia", [FatescipolController::class, 'nuestra_academia'])->name("fatescipol.nuestra_academia");
Route::get("fatescipol/requisitos", [FatescipolController::class, 'requisitos'])->name("fatescipol.requisitos");
Route::get("fatescipol/fase_convocatoria", [FatescipolController::class, 'fase_convocatoria'])->name("fatescipol.fase_convocatoria");
Route::get("fatescipol/fase_seleccion", [FatescipolController::class, 'fase_seleccion'])->name("fatescipol.fase_seleccion");
Route::get("fatescipol/fase_incorporacion", [FatescipolController::class, 'fase_incorporacion'])->name("fatescipol.fase_incorporacion");
Route::get("fatescipol/comunicados", [FatescipolController::class, 'comunicados'])->name("fatescipol.comunicados");
Route::get("fatescipol/contactos", [FatescipolController::class, 'contactos'])->name("fatescipol.contactos");

// ** ESBAPOLMUS
Route::get("esbapolmus", [EsbapolmusController::class, 'index'])->name("esbapolmus");
Route::get("esbapolmus/nuestra_academia", [EsbapolmusController::class, 'nuestra_academia'])->name("esbapolmus.nuestra_academia");
Route::get("esbapolmus/requisitos", [EsbapolmusController::class, 'requisitos'])->name("esbapolmus.requisitos");
Route::get("esbapolmus/fase_convocatoria", [EsbapolmusController::class, 'fase_convocatoria'])->name("esbapolmus.fase_convocatoria");
Route::get("esbapolmus/fase_seleccion", [EsbapolmusController::class, 'fase_seleccion'])->name("esbapolmus.fase_seleccion");
Route::get("esbapolmus/fase_incorporacion", [EsbapolmusController::class, 'fase_incorporacion'])->name("esbapolmus.fase_incorporacion");
Route::get("esbapolmus/comunicados", [EsbapolmusController::class, 'comunicados'])->name("esbapolmus.comunicados");
Route::get("esbapolmus/contactos", [EsbapolmusController::class, 'contactos'])->name("esbapolmus.contactos");

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

    // POSTULANTES
    Route::get("postulantes/preinscripcion", [PostulanteController::class, 'preinscripcion'])->name("postulantes.preinscripcion");
    Route::get("postulantes/api", [PostulanteController::class, 'api'])->name("postulantes.api");
    Route::get("postulantes/paginado", [PostulanteController::class, 'paginado'])->name("postulantes.paginado");
    Route::get("postulantes/listado", [PostulanteController::class, 'listado'])->name("postulantes.listado");
    Route::get("postulantes/listadoByCi", [PostulanteController::class, 'listadoByCi'])->name("postulantes.listadoByCi");
    Route::resource("postulantes", PostulanteController::class)->only(
        ["index", "store", "edit", "show", "update", "destroy"]
    );

    // INSCRIPCION
    Route::get("inscripcions", [InscripcionController::class, 'index'])->name("inscripcions.index");

    // REQUISITOS
    Route::get("requisitos/buscar", [RequisitoController::class, 'buscar'])->name("requisitos.buscar");
    Route::post("requisitos/store", [RequisitoController::class, 'store'])->name("requisitos.store");
    Route::put("requisitos/update/{requisito}", [RequisitoController::class, 'update'])->name("requisitos.update");

    // CONTENIDO
    Route::get("contenidos/getContenido", [ContenidoController::class, 'getContenido'])->name("contenidos.getContenido");

    // REPORTES
    Route::get('reportes/usuarios', [ReporteController::class, 'usuarios'])->name("reportes.usuarios");
    Route::get('reportes/r_usuarios', [ReporteController::class, 'r_usuarios'])->name("reportes.r_usuarios");
});
require __DIR__ . '/auth.php';
