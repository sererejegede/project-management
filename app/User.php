<?php

namespace App;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   use Notifiable;


   // The attributes that are mass assignable.
   protected $fillable = [
      'name',
      'email',
      'password',
      'username',
      'api_token',
      'profile_pic',
      'role_id'
   ];

   // The attributes that should be hidden for arrays.
   protected $hidden = [
      'password',
      'remember_token',
   ];

   public function role()
   {
      return $this->belongsTo(Role::class);
   }

   // One User has many projects
   public function projects()
   {
      return $this->belongsToMany(Project::class);
   }

   public function companies()
   {
      return $this->hasMany(Company::class);
   }

   public function tasks()
   {
      return $this->belongsToMany(Task::class);
   }

   public function comments()
   {
      return $this->hasMany(Comment::class);
   }

   public function generateToken()
   {
      $this->api_token = str_random(60);
      $this->save();
      return $this->api_token;
   }
}
