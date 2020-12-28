<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anomalie extends Model
{
    protected $table = "anomalies";

    protected $fillable = [
        'code_client', 'code_dossier', 'statut', 'type', 'dernier_utilisateur', 'code_agence'
    ];
}
