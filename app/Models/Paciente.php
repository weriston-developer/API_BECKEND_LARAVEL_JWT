<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome', 'cpf', 'celular',
    ];

    public function medicoPaciente(): HasMany
    {
        return $this->hasMany(MedicoPaciente::class, 'paciente_id');
    }
}
