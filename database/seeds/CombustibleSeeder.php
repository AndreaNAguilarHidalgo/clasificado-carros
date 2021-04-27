<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combustibles')->insert([
            'tipo'=> 'Gasolina',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('combustibles')->insert([
            'tipo'=> 'Diesel',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('combustibles')->insert([
            'tipo'=> 'Eléctrico',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('combustibles')->insert([
            'tipo'=> 'Híbrido',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
