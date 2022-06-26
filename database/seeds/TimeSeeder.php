<?php

use App\Time;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::create([
            'time' => 'Amazonas F.C',
            'empresa' => 'BAND',
        ]);
        Time::create([
            'time' => 'São Raimundo E.C',
            'empresa' => 'Portal Esporte Manaus',
        ]);
        Time::create([
            'time' => 'Libermorro F.c',
            'empresa' => 'Portal Emanuel Sports',
        ]);
        Time::create([
            'time' => 'América/ Rio Negro',
            'empresa' => 'Rede Amazônica',
        ]);
        Time::create([
            'time' => 'Manaus F.C',
            'empresa' => 'SEMCOM',
        ]);
        Time::create([
            'time' => 'Princesa do Solimões',
            'empresa' => 'Rádio Jovem PAN/FM O Dia',
        ]);
        Time::create([
            'time' => 'Holanda F.C',
            'empresa' => 'TV Acrítica',
        ]);
        Time::create([
            'time' => 'Nacional F.C',
            'empresa' => 'Jornal Acrítica',
        ]);
        Time::create([
            'time' => 'Sulamerica F.C',
            'empresa' => 'TV Encontro das Águas',
        ]);
        Time::create([
            'time' => 'A definir',
            'empresa' => 'Casa Civil',
        ]);
        Time::create([
            'time' => 'Clipper',
            'empresa' => 'Casa Militar',
        ]);
        Time::create([
            'time' => 'Fast Clube',
            'empresa' => 'Portal Caboclo',
        ]);
        Time::create([
            'time' => 'RB do Norte',
            'empresa' => 'Rede Brasil AM/Maskate TV',
        ]);
        Time::create([
            'time' => 'A definir',
            'empresa' => 'Polícia Civil',
        ]);
    }
}
