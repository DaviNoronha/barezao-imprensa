<?php

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'nome' => 'admin',
            'descricao' => 'Administrador'
        ]);

        Perfil::create([
            'nome' => 'treinador',
            'descricao' => 'Treinador'
        ]);
    }
}
