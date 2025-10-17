<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "paterno",
        "materno",
        "ci",
        "ci_exp",
        "complemento",
        "genero",
        "unidad",
        "fecha_nac",
        "cel",
        "correo",
        "nro_cuenta",
        "lugar_preins",
        "observacion",
        "estado",
        "foto",
        "user_id",
        "fecha_registro",
        "nroPre",
        "codigoPre",
        "nroInsc",
        "codigoInsc",
        "ecodigo",
        "epass",
        "status",
    ];

    protected $appends = ["url_foto", "foto_b64", "full_name", "full_ci", "fecha_registro_t", "fecha_nac_t", "edad_lim", "edad", "sede"];


    public function getSedeAttribute()
    {
        $sedes = ["LA PAZ", "ORURO", "POTOSÍ", "CHUQUISCA", "TARIJA", "PANDO", "BENI", "SANTA CRUZ", "COCHABAMBA"];
        $lugar_preins = [
            "ANAPOL" => 0,
            'FATESCIPOL "EL ALTO"' => 0,
            'FATESCIPOL "COLQUIRI"' => 0,
            'FATESCIPOL "HUANUNI"' => 1,
            'FATESCIPOL "CARACOLLO"' => 1,
            "COMANDO DPTAL. DE ORURO" => 1,
            'FATESCIPOL "POTOSÍ”' => 2,
            'FATESCIPOL "LLALLAGUA”' => 2,
            'FATESCIPOL "SUCRE”' => 3,
            'FATESCIPOL "TARIJA”' => 4,
            'FATESCIPOL "GRAN CHACO”' => 4,
            'FATESCIPOL "PANDO”' => 5,
            "COMANDO DPTAL. DE BEN" => 6,
            'FATESCIPOL "RIBERALTA"' => 6,
            'FATESCIPOL "SANTA CRUZ"' => 7,
            'FATESCIPOL "COCHABAMBA"' => 8,
            "ESBAPOLMUS" => 9,
        ];

        return $sedes[$lugar_preins[$this->lugar_preins]];
    }

    public function getEdadLimAttribute()
    {
        $fechaNacimiento = Carbon::parse($this->fecha_nac);
        $fechaLimite = Carbon::create(2025, 12, 31); //FECHA LIMITE

        $edad = $fechaNacimiento->diffInYears($fechaLimite);
        return $edad;
    }

    public function getEdadAttribute()
    {
        $nacimiento = Carbon::parse($this->fecha_nac);
        $fechaComparacion = Carbon::now();
        $diff = $nacimiento->diff($fechaComparacion);
        return [
            'anios' => $diff->y,
            'meses' => $diff->m,
            'dias' => $diff->d,
        ];
    }

    public function getFechaNacTAttribute()
    {
        return date("d/m/Y", strtotime($this->fecha_nac));
    }

    public function getFechaRegistroTAttribute()
    {
        return date("d/m/Y", strtotime($this->fecha_registro));
    }

    public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->paterno . ($this->materno ? ' ' . $this->materno : '');
    }

    public function getFullCiAttribute()
    {
        return $this->ci . ' ' . $this->ci_exp . ($this->complemento ? ' ' . $this->complemento : '');
    }

    public function getUrlFotoAttribute()
    {
        if ($this->foto) {
            return asset("imgs/users/" . $this->foto);
        }
        return asset("imgs/users/default.png");
    }

    public function getFotoB64Attribute()
    {
        $path = public_path("imgs/users/" . $this->foto);
        if (!$this->foto || !file_exists($path)) {
            $path = public_path("imgs/users/default.png");
        }
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requisito()
    {
        return $this->hasOne(Requisito::class, 'postulante_id');
    }

    public function evaluacion_medica()
    {
        return $this->hasOne(EvaluacionMedica::class, 'postulante_id');
    }

    public function evaluacion_psicologica()
    {
        return $this->hasOne(EvaluacionPsicologica::class, 'postulante_id');
    }

    public function evaluacion_fisica()
    {
        return $this->hasOne(EvaluacionFisica::class, 'postulante_id');
    }

    public function evaluacion_instruccion()
    {
        return $this->hasOne(EvaluacionInstruccion::class, 'postulante_id');
    }

    public function evaluacion_conocimiento()
    {
        return $this->hasOne(EvaluacionConocimiento::class, 'postulante_id');
    }

    public function evaluacion_odontologica()
    {
        return $this->hasOne(EvaluacionOdontologica::class, 'postulante_id');
    }
}
