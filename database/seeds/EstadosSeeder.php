<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file    = File::get("database/data/br_estados.json");
		$content = json_decode($file);

		foreach($content as $obj){
			try{
	    		DB::table('estados')->insert([
		        	'id' => $obj->id,
		            'nome' => $obj->name,
		            'sigla' => $obj->sigla,
		            'pais_id' => 1
		        ]);
	    	}catch(\Exception $e){
	    		echo $e->getMessage();
	    	}
		}
    }
}
