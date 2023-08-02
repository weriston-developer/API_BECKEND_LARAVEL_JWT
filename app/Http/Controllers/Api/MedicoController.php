<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Http\Requests\MedicoUpdateRequest;
use App\Http\Requests\VincularPacienteRequest;
use App\Http\Resources\MedicoPacienteResource;
use App\Http\Resources\MedicoResource;
use App\Models\Medico as ModelsMedico;
use App\Models\Paciente;
use App\Services\MedicoService;
use Illuminate\Http\Response;

class MedicoController extends Controller
{
    private $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function store(MedicoRequest $request)
    {
        try {
            $medico = $this->medicoService->create($request->validated());

            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar médico: '.$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(MedicoUpdateRequest $request, string $id)
    {
        try {
            $medico = ModelsMedico::findOrFail($id);
            $medico = $this->medicoService->update($medico, $request->validated());

            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar médico: '.$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(string $id)
    {
        try {
            $medico = ModelsMedico::findOrFail($id);
            $this->medicoService->destroy($medico);

            return response()->json(['message' => 'Médico excluído com sucesso.'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao excluir médico: '.$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function vincularPaciente(VincularPacienteRequest $request, string $id_medico)
    {
        try {
            $medico_id = $request->input('paciente_id');

            $medico = ModelsMedico::findOrFail($medico_id);

            $paciente_id = $request->input('paciente_id');

            $paciente = Paciente::findOrFail($paciente_id);

            $medicoPaciente = $this->medicoService->vincularPaciente($medico, $paciente);

            return new MedicoPacienteResource($medicoPaciente);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
