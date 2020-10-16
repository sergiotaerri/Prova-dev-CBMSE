<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
'first_name',
'second_name'
    ];

    public function estaEmContato()
    {
        return $this->hasMany('App\Models\PersonContact');
    }
}
