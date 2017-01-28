<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_revs', function (Blueprint $table) {
            $table->integer('image_id')->unsigned();
            $table->integer('rev_id')->unsigned();

            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('rev_id')->references('id')->on('revisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_revs');
    }
}
