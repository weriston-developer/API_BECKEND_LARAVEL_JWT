<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicoResource;
use App\Models\Cidade as ModelsCidade;
use App\Services\CidadeService;
use Illuminate\Http\Response;

class CidadeController extends Controller
{
    private $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function destroy(string $id)
    {
        try {
            $cidade = ModelsCidade::findOrFail($id);
            $this->cidadeService->destroy($cidade);

            return response()->json(['message' => 'Cidade excluída com sucesso.'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao excluir cidade: '.$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function medicosByCidade(string $id_cidade)
    {
        try {
            $medicos = $this->cidadeService->getMedicosByCidade($id_cidade);

            return MedicoResource::collection($medicos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar médicos: '.$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
