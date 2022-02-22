<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string("box_num");
            $table->string("vendor");
            $table->string("model_num");
            $table->string("sl_num");
            $table->string("category");
            $table->string("floor");
            $table->string("tower"); 
            $table->string("department");
            $table->string("manufacturer");
            
            $table->string("user");   
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
        Schema::dropIfExists('assets');
    }
}
