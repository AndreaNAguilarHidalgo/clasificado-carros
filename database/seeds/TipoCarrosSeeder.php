<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_carros')->insert([
            'nombre'=> 'Motocicleta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('tipo_carros')->insert([
            'nombre'=> 'Camioneta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tipo_carros')->insert([
            'nombre'=> 'Automóvil',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('tipo_carros')->insert([
            'nombre'=> 'Furgoneta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
