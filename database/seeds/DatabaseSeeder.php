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
        $this->call([
        	PaisesSeeder::class,
        	EstadosSeeder::class,
        	CidadesSeeder::class,
            Profissoes_categoriasSeeder::class,
            ProfissoesSeeder::class,
        ]);
    }
}
