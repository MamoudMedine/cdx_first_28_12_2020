<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anomalie_commentaire extends Model
{
    protected $table = "anomalie_commentaires";

    protected $fillable = [
        'anomalie_id', 'user_id', 'contenu'
    ];
}
