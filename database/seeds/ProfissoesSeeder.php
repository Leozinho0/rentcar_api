<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Saúde - Enfermagem
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 1,
	            'nome' => 'Enfermeiro',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	try{
    		DB::table('profissoes')->insert([
	        	'id' => 2,
	            'nome' => 'Auxiliar de Enfermagem',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	try{
    		DB::table('profissoes')->insert([
	        	'id' => 3,
	            'nome' => 'Técnico de Enfermagem',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Farmácia
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 200,
	            'nome' => 'Farmacêutico',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	try{
    		DB::table('profissoes')->insert([
	        	'id' => 201,
	            'nome' => 'Técnico de Farmácia',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

        try{
    		DB::table('profissoes')->insert([
	        	'id' => 202,
	            'nome' => 'Técnico de Laboratório de Análises Clínicas',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Medicina
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 300,
	            'nome' => 'Médico',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Nutrição
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 400,
	            'nome' => 'Nutricionista',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Odontologia
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 500,
	            'nome' => 'Dentista',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	try{
    		DB::table('profissoes')->insert([
	        	'id' => 501,
	            'nome' => 'Auxiliar Odontológico',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	try{
    		DB::table('profissoes')->insert([
	        	'id' => 502,
	            'nome' => 'Protético',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Psicologia
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 600,
	            'nome' => 'Psicólogo',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Fisioterapia
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 700,
	            'nome' => 'Fisioterapeuta',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}

    	//Saúde - Biomedicina
        try{
    		DB::table('profissoes')->insert([
	        	'id' => 800,
	            'nome' => 'Biomédico',
	            'categoria_id' => 1
	        ]);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
