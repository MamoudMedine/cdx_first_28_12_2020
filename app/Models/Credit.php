<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Credit extends Model
{
    protected $table = "credits";

	public static function boot()
    {
        parent::boot();

        static::updating(function ($instance) {
            // update cache content
            Cache::put('get_anomalies', $instance);
        });

        static::updating(function ($instance) {
            // update cache content
            Cache::put('get_dossiers', $instance);
        });

        static::deleting(function ($instance) {
            // delete post cache
            Cache::forget($instance);
        });
    }




}
