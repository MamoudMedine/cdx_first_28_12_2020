<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $table = "agences";

    protected $fillable = [
        'email'
    ];
}
