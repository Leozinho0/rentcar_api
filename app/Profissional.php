<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Estado;
use App\Cidade;
use App\Profissao;

class Profissional extends Model
{
    use SoftDeletes;
    protected $table = 'profissionais';

    public function estado() {
	    return $this->belongsTo(Estado::class);
	}

	public function cidade() {
	    return $this->belongsTo(Cidade::class);
	}

	public function profissao() {
	    return $this->belongsTo(Profissao::class);
	}
}
