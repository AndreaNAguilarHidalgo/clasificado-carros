<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CondicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condicions')->insert([
            'estado'=> 'Nuevo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('condicions')->insert([
            'estado'=> 'Seminuevo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
