<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('projects', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->longText('description')->nullable();
         $table->enum('status', ['PENDING', 'COMPLETED', 'NOT STARTED'])->nullable();
         $table->unsignedInteger('days');

         $table->unsignedInteger('user_id');
         $table->foreign('user_id')->references('id')->on('users');

         $table->unsignedInteger('company_id');
         $table->foreign('company_id', 'company_project_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade')
            ->change();
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
      Schema::dropIfExists('projects');
   }
}
