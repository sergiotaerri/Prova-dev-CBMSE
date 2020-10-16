<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonContact extends Model
{
    use HasFactory;

    protected $fillable = [
'contact',
'person_id',
'contact_type_id'
    ];

}
