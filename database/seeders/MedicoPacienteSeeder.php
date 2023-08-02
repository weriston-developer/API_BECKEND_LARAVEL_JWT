<?php

namespace Database\Seeders;

use App\Models\MedicoPaciente;
use Illuminate\Database\Seeder;

class MedicoPacienteSeeder extends Seeder
{
    public function run()
    {
        MedicoPaciente::create(['medico_id' => 1, 'paciente_id' => 1]);
        MedicoPaciente::create(['medico_id' => 2, 'paciente_id' => 2]);
        MedicoPaciente::create(['medico_id' => 3, 'paciente_id' => 3]);
        MedicoPaciente::create(['medico_id' => 4, 'paciente_id' => 4]);
        MedicoPaciente::create(['medico_id' => 5, 'paciente_id' => 5]);
    }
}
