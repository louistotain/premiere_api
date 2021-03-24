<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title','categories_id'];

    public function actors(){
        return $this->belongsToMany('App\Models\Actor');
    }

    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }
}
