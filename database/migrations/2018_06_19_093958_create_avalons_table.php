<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avalons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix');
            $table->string('wallet');
            $table->string('class');
            $table->string('type');
            $table->string('ovcode');
            $table->string('filename');
            $table->string('filesize');
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
        Schema::dropIfExists('avalons');
    }
}
