<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'especialidade' => $this->especialidade,
            'cidade' => new CidadeResource($this->cidade),
        ];
    }
}
