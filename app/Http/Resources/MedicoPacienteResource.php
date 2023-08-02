<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'medico_id' => $this->medico_id,
            'paciente_id' => $this->paciente_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'medico' => new MedicoResource($this->medico),
            'paciente' => new PacienteResource($this->paciente),
        ];
    }
}
