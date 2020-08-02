<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hocsinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hocsinh', function (Blueprint $table) {
		// $table->increments('id');
		$table->string('HS_MA', 20);
        $table->string('HS_TEN', 100);
        $table->string('HS_DIACHI', 200);
        $table->string('HS_SDT', 15);
        // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('hocsinh');
    }
}
