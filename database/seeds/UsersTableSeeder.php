<?php

use App\Perfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfilAdmin = Perfil::where('nome', 'admin')->first();

        DB::table('users')->insert([
            'nome' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'perfil_id' => $perfilAdmin->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
