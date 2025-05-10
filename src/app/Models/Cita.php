<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    /** @use HasFactory<\Database\Factories\CitaFactory> */
    use HasFactory;

    protected $fillable = ['marca','modelo','matricula','duracion_estimada'];

    public function cliente(): BelongsTo {
        
        return $this->belongsTo(User::class, 'cliente_id');
    }

}
