<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [ 
        'number', 'isWP', 'cpf_user' 
    ];

    
}
