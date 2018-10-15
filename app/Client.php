<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{  
	protected $table = 'client';

    protected $fillable = [
        'name', 'email', 'birthdate', 'cpf', 'adress_id',
    ];

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }
}
