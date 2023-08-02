<?php

namespace App\Services;

use App\Models\Paciente;

class PacienteService
{
    public function create(array $data)
    {
        try {
            $paciente = Paciente::create($data);

            return $paciente;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao criar paciente: '.$e->getMessage());
        }
    }

    public function update(Paciente $paciente, array $data)
    {
        try {
            $paciente->update($data);

            return $paciente;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao atualizar paciente: '.$e->getMessage());
        }
    }

    public function destroy(Paciente $paciente)
    {
        try {
            $paciente->delete();
        } catch (\Exception $e) {
            throw new \Exception('Erro ao excluir paciente: '.$e->getMessage());
        }
    }

    /**
     * Valida um número de CPF
     */
    public function validarCPF(string $cpf): bool
    {
        // Remove caracteres não numéricos do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Verifica se todos os dígitos são iguais (CPF inválido)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula os dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
