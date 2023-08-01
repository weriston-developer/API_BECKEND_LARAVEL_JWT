<?php

namespace App\Services;

use App\Models\Paciente;
use Illuminate\Validation\ValidationException;

class PacienteService
{
    public function create(array $data)
    {
        try {
            $paciente = Paciente::create($data);
            return $paciente;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao criar paciente: ' . $e->getMessage());
        }
    }

    public function update(Paciente $paciente, array $data)
    {
        try {
            $paciente->update($data);
            return $paciente;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao atualizar paciente: ' . $e->getMessage());
        }
    }

    public function destroy(Paciente $paciente)
    {
        try {
            $paciente->delete();
        } catch (\Exception $e) {
            throw new \Exception('Erro ao excluir paciente: ' . $e->getMessage());
        }
    }
}
