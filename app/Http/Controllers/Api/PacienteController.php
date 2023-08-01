<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Http\Requests\PacienteRequest;
use App\Models\Paciente as ModelsPaciente;
use App\Services\PacienteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PacienteController extends Controller
{
    private $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function store(PacienteRequest $request)
    {
        try {
            $paciente = $this->pacienteService->create($request->validated());
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar paciente: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(PacienteRequest $request, string $id)
    {
        try {
            $paciente = ModelsPaciente::findOrFail($id);
            $paciente = $this->pacienteService->update($paciente, $request->validated());
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar paciente: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(string $id)
    {
        try {
            $paciente = ModelsPaciente::findOrFail($id);
            $this->pacienteService->destroy($paciente);
            return response()->json(['message' => 'Paciente excluído com sucesso.'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao excluir paciente: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
