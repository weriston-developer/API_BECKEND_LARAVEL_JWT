<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'especialidade', 'cidade_id',
    ];

    public function cidade(): BelongsTo
    {
        return $this->BelongsTo(Cidade::class, 'cidade_id');
    }

    public function medicoPaciente(): HasMany
    {
        return $this->hasMany(MedicoPaciente::class, 'medico_id');
    }
}
