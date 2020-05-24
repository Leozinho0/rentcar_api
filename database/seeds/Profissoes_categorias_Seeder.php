<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Profissoes_categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
    		DB::table('profissoes_categorias')->insert([
	        	'id' => 1,
	            'nome' => 'Saúde'
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
