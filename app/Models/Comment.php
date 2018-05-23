<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
       'body',
       'url',
       'commentable_id',
       'commentable_type',
       'user_id'
    ];

    public function project(){
       return $this->morphTo();
    }

    public function user(){
       return $this->belongsTo(User::class);
    }
}
