<?php

namespace App\Models;

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
}
