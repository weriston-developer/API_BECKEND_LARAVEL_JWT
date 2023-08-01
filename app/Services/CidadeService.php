<?php

namespace App\Services;

use App\Models\Cidade;

class CidadeService
{
    public function create(array $data)
    {
        return cidade::create($data);
    }

    public function update(cidade $cidade, array $data)
    {
        $cidade->update($data);
        return $cidade;
    }

    public function destroy(cidade $cidade)
    {
        $cidade->delete();
    }

    public function getMedicosByCidade(string $id_cidade)
    {
        try {
            $cidade = Cidade::findOrFail($id_cidade);

            $medicos = $cidade->medicos()->paginate();
            return $medicos;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar médicos da cidade: ' . $e->getMessage());
        }
    }
}
