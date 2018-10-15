<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
	protected $table = 'adress';

    protected $fillable = [
        'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'cep', 'latitude',  'longitude'
    ];

    public function client()
    {
        return $this->belongsTo('Client');
    }
}
