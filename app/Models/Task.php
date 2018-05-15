<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = [
      'name',
      'description',
      'hours',
      'project_id',
      'user_id'
   ];

   // A Task may belong to MANY users
   // ONE User has MANY tasks
   public function users()
   {
      return $this->belongsToMany(User::class);
   }

   // A Task belongs to a project
   // ONE Project has MANY Tasks
   public function project()
   {
      return $this->belongsTo(Project::class);
   }
}
