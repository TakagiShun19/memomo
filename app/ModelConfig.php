<?php

namespace App;

use Illuminate\Support\Str;

trait ModelConfig
{

    /**
     * モデル設計
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = Str::uuid();
        });
    }

}
