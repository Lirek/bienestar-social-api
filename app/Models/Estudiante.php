<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Estudiante extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'estudiante';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'lastnames', 'names', 'cedula', 'birth_date', 'place_birth', 'sex', 'email', 'twitter', 'movil_phone', 'local_phone','other_phone', 'address_origin', 'live_residence', 'address_residence', 'residence_phone', 'admission_university', 'carrer_or_pnf', 'admission_period', 'semestre_trayecto', 'turn', 'change_carrer', 'cause_change',
    ];

    protected $appends = [
        'date_es',
    ];

    public function getBirthDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($this->attributes['birth_date'])->format('d-m-Y');
        }
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function getUpdatedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function getDeletedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function getDateEsAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }


}
