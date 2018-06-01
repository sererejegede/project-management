<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
//   protected $guard = 'api';

   protected $fillable = [
      'name',
      'description',
      'user_id'
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function projects()
   {
      return $this->hasMany(Project::class);
   }
}
