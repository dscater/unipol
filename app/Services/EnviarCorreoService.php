<?php

namespace App\Services;

use App\Models\Configuracion;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\PreinscripcionMail;
use App\Models\Postulante;
use Illuminate\Support\Facades\Log;

class EnviarCorreoService
{

    private $configuracion;
    public function __construct()
    {
        $this->configuracion = null;
        $this->abrev_moneda = "";
        $configuracion = Configuracion::first();
        $servidor_correo = $configuracion->envio_email;
        if ($configuracion) {
            Config::set(
                [
                    'mail.mailers.default' => $servidor_correo["driver"] ?? 'smtp',
                    'mail.mailers.smtp.host' => $servidor_correo["host"] ?? 'smtp.hostinger.com',
                    'mail.mailers.smtp.port' => $servidor_correo["puerto"] ?? '587',
                    'mail.mailers.smtp.encryption' => $servidor_correo["encriptado"] ?? 'tls',
                    'mail.mailers.smtp.username' => $servidor_correo["correo"] ?? 'mensaje@emsytsrl.com',
                    'mail.mailers.smtp.password' => $servidor_correo["password"] ?? '8Z@d>&kj^y',
                    'mail.from.address' => $servidor_correo["correo"] ?? 'mensaje@emsytsrl.com',
                    'mail.from.name' => $servidor_correo["nombre"] ?? 'GOIRDROP',
                ]
            );
        }
        $this->configuracion = $configuracion;
        if ($configuracion && $configuracion->conf_moneda) {
            $this->abrev_moneda = $configuracion->conf_moneda["abrev"];
        }
    }

    /**
     * Enviar correo de nueva orden de venta
     *
     * @param Postulante $postulante
     * @return void
     */
    public function mailPreinscripcion(Postulante $postulante): void
    {

        $mensaje = "Hola " . $postulante->full_name . '<br/>';
        $mensaje .= 'Tú código de preinscripción es <strong>' . $postulante->codigo . '</strong><br/>
        Para finalizar tu registro debes ingresar tú Número de Carnet y el código en el siguiente <a href="' . route('formularioRegistro.index', $postulante->id) . '">Formulario de registro</a>
        </strong>.<br/> Te recomendamos no compartir el código con nadie.';

        $datos = [
            "mensaje" => $mensaje
        ];

        Mail::to($postulante->correo)
            ->send(new PreinscripcionMail($datos));
    }
}
