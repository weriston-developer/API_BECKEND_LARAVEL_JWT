<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Http\Requests\PacienteRequest;
use App\Http\Requests\PacienteUpdateRequest;
use App\Http\Resources\PacienteFromMedicoPacienteResource;
use App\Models\Medico;
use App\Models\MedicoPaciente;
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
            $cpf = $request->cpf;

            if (!$this->pacienteService->validarCPF($cpf)) {
                return response()->json(['errors' => ['cpf' => 'CPF inválido']], 422);
            }
            $paciente = $this->pacienteService->create($request->validated());
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar paciente: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(PacienteUpdateRequest $request, string $id)
    {
        try {
            $cpf = $request->cpf;

            if (!$this->pacienteService->validarCPF($cpf)) {
                return response()->json(['errors' => ['cpf' => 'CPF inválido']], 422);
            }
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


    public function medicosByPacientes(string $medico_id)
    {
        try {
            $medicoPacientes = MedicoPaciente::where('medico_id', $medico_id)->get();

            if ($medicoPacientes->isEmpty()) {
                return response()->json(['error' => 'Nenhum registro encontrado.'], Response::HTTP_NOT_FOUND);
            }
            // Caso haja registros, crie a Resource para formatar os dados dos pacientes
            $pacientesFormatted = PacienteFromMedicoPacienteResource::collection($medicoPacientes);

            return response()->json($pacientesFormatted, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
