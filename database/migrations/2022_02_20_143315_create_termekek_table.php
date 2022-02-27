<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermekekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termekek', function (Blueprint $table) {
            $table->string("termekneve");
            $table->integer("ar");
            $table->string("alapanyag");
            $table->timestamp("gyartasiido");
        });


        
    }


    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termekek');
    }
}
