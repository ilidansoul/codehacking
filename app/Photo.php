<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = "/fotodirektori/";

    protected $table = 'photos';
    protected $fillable = [
        'lokasi_file',
        'id',
    ];

    public function getlokasifileAttribute($lokasi){
        return $this->uploads . $lokasi;
    }

    public function photo ()
    {
        return $this->belongsTo('App\Post', 'id');
    }
}
