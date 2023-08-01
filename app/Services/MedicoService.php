<?php

namespace App\Services;

use App\Models\Medico;
use Illuminate\Validation\ValidationException;

class MedicoService
{
    public function create(array $data)
    {
        try {
            $medico = Medico::create($data);
            return $medico;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao criar médico: ' . $e->getMessage());
        }
    }

    public function update(Medico $medico, array $data)
    {
        try {
            $medico->update($data);
            return $medico;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao atualizar médico: ' . $e->getMessage());
        }
    }

    public function destroy(Medico $medico)
    {
        try {
            $medico->delete();
        } catch (\Exception $e) {
            throw new \Exception('Erro ao excluir médico: ' . $e->getMessage());
        }
    }
}
