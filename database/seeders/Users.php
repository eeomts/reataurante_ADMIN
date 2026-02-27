<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    public function run(): void
    {
        $cargoId = DB::table('cargos_users')->insertGetId([
            'name'       => 'Administrador',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $statusId = DB::table('status_users')->insertGetId([
            'name'       => 'Ativo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name'      => 'Administrador',
            'email'     => '123@gmail.com',
            'password'  => Hash::make(123),
            'cargo_id'  => $cargoId,
            'status_id' => $statusId,
        ]);
    }
}
