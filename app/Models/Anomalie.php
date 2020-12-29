<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Anomalie extends Model
{
    protected $table = "anomalies";

    protected $fillable = [
        'code_client', 'code_dossier', 'statut', 'type', 'dernier_utilisateur', 'code_agence'
    ];
    public static function get_anomalies($code_agence){
        return Client::join('credits', 'clients.code_client', 'credits.code_client')
               ->where('clients.code_agence', $code_agence)->get();
    }

}
