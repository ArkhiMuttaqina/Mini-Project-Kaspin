<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'akunadmin',
            'foto_profil'=>'NULL',
            'paraf'=>'NULL',
            'nama' => 'Maudy Ayunda',
            'inisial' =>'MA',
            'password' => encrypt('ayunda01'),
            'nohp' => '085608252784',
            'id_hakakses' => '1',
            'id_status' => '1',
            'otp' => '-',
            'created_at' => \Carbon\Carbon::now()
        ]);

    }
}
