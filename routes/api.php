<?php

use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\ProtectAuthorizedRoutes;
use App\Http\Resources\CidadeResource;
use App\Http\Resources\MedicoResource;
use App\Http\Resources\PacienteResource;
use App\Http\Resources\UserResource;
use App\Models\Cidade;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'api_name' => 'Laravel API + JWT.',
        'api_version' => '1.0.1',
    ]);
});

Route::group([

    'middleware' => 'api',

], function ($router) {
    // Requiçoes Users

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'store']);

    // Requiçoes Medicos
    Route::get('/medicos', function () {
        return MedicoResource::collection(Medico::paginate());
    });
    Route::get('/medico/{id}', function (string $id) {
        return new MedicoResource(Medico::findOrFail($id));
    });

    // Requiçoes cidades

    Route::get('/cidades', function () {
        return CidadeResource::collection(Cidade::paginate());
    });
    Route::get('/cidades/{id_cidade}/medicos', [CidadeController::class, 'medicosByCidade']);

    Route::middleware(ProtectAuthorizedRoutes::class)->group(function () {
        // Requiçoes ususarios com validaçõe JWT

        // Lista usuarios
        Route::get('/users', function () {
            return UserResource::collection(User::paginate());
        });
        // Lista usuario especifico
        Route::get('/user/{id}', function (string $id) {
            return new UserResource(User::findOrFail($id));
        });
        // Deleta usuario especifico
        Route::delete('/user/{id}', [UserController::class, 'delete']);
        // Atualizar usuario especifico
        Route::patch('/user/{id}', [UserController::class, 'update']);
        // Valida se o token do usuario
        Route::post('/me', [UserController::class, 'me']);
        // Deleta o  token do usuario
        Route::post('/logout', [UserController::class, 'logout']);

        // Requiçoes pacientes com validaçõe JWT
        // lista pacientes
        Route::get('/pacientes', function () {
            return PacienteResource::collection(Paciente::paginate());
        });
        // lista paciente especifico pelo id
        Route::get('/paciente/{id}', function (string $id) {
            return new PacienteResource(Paciente::findOrFail($id));
        });
        // Atualiza paciente especifico
        Route::post('/pacientes/{id_paciente}', [PacienteController::class, 'update']);
        // Criar paciente especifico
        Route::post('/pacientes', [PacienteController::class, 'store']);
        // Deleta paciente especifico
        Route::delete('/paciente/{id}', [PacienteController::class, 'destroy']);
        // Pacietes por medico
        Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'medicosByPacientes']);

        // Requiçoes medicos com validaçõe JWT
        // Cadastra medico novo
        Route::post('/medicos', [MedicoController::class, 'store']);
        // Vincular Paciente medico
        Route::post('/medicos/{id_medico}/pacientes', [MedicoController::class, 'vincularPaciente']);
    });
});
