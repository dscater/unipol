<?php

namespace App\Services;

use App\Mail\CodigoVerificacionMail;
use App\Mail\FinalizaInscripcionMail;
use App\Mail\InscripcionMail;
use App\Models\Configuracion;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\PreinscripcionMail;
use App\Models\Postulante;
use App\Models\User;
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
     * Enviar correo de nueva preinscripcion
     *
     * @param Postulante $postulante
     * @return void
     */
    public function mailPreinscripcion(Postulante $postulante): void
    {

        $mensaje = "Hola " . $postulante->full_name . '<br/>';
        $mensaje .= 'Tú código de preinscripción es <h4 style="font-size:2em";>' . $postulante->codigoPre . '</h4><br/>
        Para finalizar tu registro debes ingresar tú Número de Carnet y el código en el siguiente <a href="' . route('formularioRegistro.index', $postulante->id) . '">Formulario de registro</a>
        </strong>.<br/> Te recomendamos no compartir el código con nadie.';

        $datos = [
            "mensaje" => $mensaje
        ];

        Mail::to($postulante->correo)
            ->send(new PreinscripcionMail($datos));
    }

    /**
     * Enviar correo de nueva preinscripcion
     *
     * @param Postulante $postulante
     * @return void
     */
    public function mailInscripcion(Postulante $postulante): void
    {

        $mensaje = "Hola " . $postulante->full_name . '<br/>';
        $mensaje .= 'Tú código de inscripción es <h4 style="font-size:2em";>' . $postulante->codigoInsc . '</h4><br/>';
        $mensaje .= 'Recibiras un correo, una vez sean <b>VERIFICADOS</b> tus documentos';

        // $path = public_path('files/declaracion.pdf');
        $datos = [
            "mensaje" => $mensaje,
        ];

        Mail::to($postulante->correo)
            ->send(new InscripcionMail($datos));
    }

    /**
     * Enviar correo de nueva preinscripcion
     *
     * @param Postulante $postulante
     * @return void
     */
    public function mailFinalizaInscripcion(Postulante $postulante): void
    {

        $mensaje = "Hola " . $postulante->full_name . '<br/>';
        $mensaje .= 'Tus documentos de la inscripción con código <span style="font-size:1.2em";>' . $postulante->codigoInsc . '</span> fueron verificados y no se tienen observaciones<br/>';
        $mensaje .= '<p style="font-size:1.2em;font-weight:bold;">TU INSCRIPCIÓN ESTA COMPLETA, ahora puedes ver tus evaluaciones y notas</p>
        <p><a href="' . route('inicio') . '">IR A UNIPOL</a></p>';

        // $path = public_path('files/declaracion.pdf');
        $datos = [
            "mensaje" => $mensaje,
        ];

        Mail::to($postulante->correo)
            ->send(new FinalizaInscripcionMail($datos));
    }

    /**
     * Enviar correo de codigo verificacion login POSTULANTE
     *
     * @param User $user
     * @return void
     */
    public function mailCodigoVerificacion(User $user, $codigo): void
    {
        $mensaje = "Hola " . $user->postulante->full_name . '<br/>';
        $mensaje .= 'Tú código de verificación es <h4 style="font-size:2em";>' . $codigo . '</h4><br/>
        </strong>.<br/> Te recomendamos no compartir el código con nadie.';

        $datos = [
            "mensaje" => $mensaje
        ];

        Mail::to($user->correo)
            ->send(new CodigoVerificacionMail($datos));
    }
}
