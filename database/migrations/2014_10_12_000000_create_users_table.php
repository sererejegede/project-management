<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('users', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('email')->unique();
         $table->string('password');
         $table->char('api_token', 60)->nullable()->after('password');
         $table->string('username');
         $table->string('profile_pic')->nullable();
         $table->unsignedInteger('role_id')->default(4);
         $table->foreign('role_id')->references('id')->on('roles');

         $table->rememberToken();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('users');
   }
}
