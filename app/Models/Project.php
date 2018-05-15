<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   protected $fillable = [
      'name',
      'description',
      'status',
      'days',
      'company_id',
      'user_id'
   ];

   // A Project belongs to a Company
   // ONE Company has MANY Projects
   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   // A Project belongs to a Company
   // ONE User has MANY Projects
   public function users()
   {
      return $this->belongsToMany(User::class);
   }

   // A Project has MANY Tasks
   public function tasks()
   {
      return $this->hasMany(Task::class);
   }
}
