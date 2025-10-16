<?php

namespace App\Models;

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
        "nro_insc",
        "codigo",
        "status",
    ];

    protected $appends = ["url_foto", "foto_b64", "full_name", "full_ci", "fecha_registro_t", "fecha_nac_t"];


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
}
