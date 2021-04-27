<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TipoCarrosSeeder::class);
        $this->call(CombustibleSeeder::class);
        $this->call(CondicionSeeder::class);
    }
}
