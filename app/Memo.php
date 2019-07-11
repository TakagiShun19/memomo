<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    public $incrementing = false;
    use ModelConfig;


    protected $hidden = [
        'id',
    ];
    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
   protected $appends = ['updated_at_for_human'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

/**
 *
 */
    public function getUpdatedAtForHumanAttribute()
    {
        return $this->attributes['updated_at_for_human'] = $this->updated_at->diffForHumans();
    }
}
