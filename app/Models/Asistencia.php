<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id','asistencia_semanal','created_at'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
    
}
