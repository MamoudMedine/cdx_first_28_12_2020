<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Action extends Model
{
    protected $table = "actions";

    protected $fillable = [
        'commentaire', 'type', 'contact', 'code_dossier', 'code_client', 'code_agence', 'action_commentaire', 'specialite'
    ];


}
