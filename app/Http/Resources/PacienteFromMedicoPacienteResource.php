<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteFromMedicoPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_medico' => $this->medico->id,
            'nome_medico' => $this->medico->nome,
            'especialidade' => $this->medico->especialidade,
            'paciente' => new PacienteResource($this->paciente),

        ];
    }
}
