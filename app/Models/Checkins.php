<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkins extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','action','late'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');

    }
    public function userName () {
        return User::where('id', $this->user_id)->first()->name;
    }
}
