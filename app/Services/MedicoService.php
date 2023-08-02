<?php

namespace App\Services;

use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;

class MedicoService
{
    public function create(array $data)
    {
        try {
            $medico = Medico::create($data);

            return $medico;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao criar médico: '.$e->getMessage());
        }
    }

    public function update(Medico $medico, array $data)
    {
        try {
            $medico->update($data);

            return $medico;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao atualizar médico: '.$e->getMessage());
        }
    }

    public function destroy(Medico $medico)
    {
        try {
            $medico->delete();
        } catch (\Exception $e) {
            throw new \Exception('Erro ao excluir médico: '.$e->getMessage());
        }
    }

    public function vincularPaciente(Medico $medico, Paciente $paciente)
    {
        try {

            if (MedicoPaciente::where('medico_id', $medico->id)->where('paciente_id', $paciente->id)->exists()) {
                throw new \Exception('O paciente já está vinculado a esse médico.');
            }

            $medicoPaciente = new MedicoPaciente([
                'medico_id' => $medico->id,
                'paciente_id' => $paciente->id,
            ]);
            $medicoPaciente->save();

            return $medicoPaciente;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao vincular paciente ao médico: '.$e->getMessage());
        }
    }
}
