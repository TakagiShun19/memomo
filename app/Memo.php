<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Memo extends Model
{
    public $incrementing = false;
    use ModelConfig;


    protected $hidden = [
        'id', 'image',
    ];
    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
   protected $appends = [
       'updated_at_for_human',
       'image_url',
   ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

/**
 *画像url
 */
    public function getUpdatedAtForHumanAttribute()
    {
        return $this->attributes['updated_at_for_human'] = $this->updated_at->diffForHumans();
    }

    /**
     * 画像のurlを追加
     * @return |null
     */
    public function getImageUrlAttribute()
    {
        if (Storage::disk('public')->exists($this->image_path)){
            return $this->attributes['image_url'] = Storage::disk()->url($this->image_path);
        }

        return null;
    }
}
