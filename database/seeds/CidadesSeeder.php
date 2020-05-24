<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file    = File::get("database/data/br_cidades.json");
		$content = json_decode($file);

		foreach($content as $obj){
			try{
	    		DB::table('cidades')->insert([
		        	'id' => $obj->id,
		            'nome' => $obj->name,
		            'estado_id' => $obj->state_id
		        ]);
	    	}catch(\Exception $e){
	    		echo $e->getMessage();
	    	}
		}
    }
}
