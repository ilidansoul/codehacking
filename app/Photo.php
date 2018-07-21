<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = "/fotodirektori/";

    protected $fillable = [
        'lokasi_file',
        'id'
    ];

    public function getlokasifileAttribute($lokasi){
        return $this->uploads . $lokasi;
    }

    public function  lokasi(){
        return $this->uploads;
    }

}
