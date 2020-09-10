<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = ['color', 'background_color', 'user_id' , 'image'];

     public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
