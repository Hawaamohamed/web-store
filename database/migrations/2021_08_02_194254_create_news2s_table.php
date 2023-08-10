<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNews2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
         Schema::create('news2s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('added_by');
            $table->longText('description');
            $table->enum('status', ['approved', 'rejected']); $table->softDeletes();
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
        Schema::dropIfExists('news2s');
    }
}
