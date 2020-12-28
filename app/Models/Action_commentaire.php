<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action_commentaire extends Model
{
    protected $table = "action_commentaires";
    
    protected $fillable = [
        'action_id', 'user_id', 'contenu'
    ];
}
