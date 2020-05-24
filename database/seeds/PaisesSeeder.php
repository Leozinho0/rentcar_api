<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	try{
    		DB::table('paises')->insert([
	        	'id' => 1,
	            'nome' => 'Brasil',
	            'sigla' => 'BRA'
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
