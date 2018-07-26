<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id',
      'category_id',
      'photo_id',
      'title',
        'content',
        'created_at',
        'updated_at'

    ];

    public function pengguna(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function photo(){
        return $this->belongsTo('App\Photo', 'photo_id');
    }

    public function kategori(){
        return $this->belongsTo('App\Category', 'categoy_id');
    }
}
