<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    /** @use HasFactory<\Database\Factories\CitaFactory> */
    use HasFactory;

    protected $fillable = ['marca','modelo','matricula'];

    public function cliente(): BelongsTo {
        
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public static function rules()
    {
        return [
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required|min:6'
        ];
    }
}