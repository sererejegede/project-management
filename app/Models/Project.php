<?php

namespace App\Models;

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
}
