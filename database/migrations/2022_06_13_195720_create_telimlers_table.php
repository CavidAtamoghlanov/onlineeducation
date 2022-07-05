<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telimlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('submodul_id');
            $table->integer('telimci_id');
            $table->string('short_desc');
            $table->string('desc');
            $table->string('picture')->nullable()->default(null);
            $table->string('video_link')->nullable()->default(null);
            $table->string('material')->nullable()->default(null);
            $table->string('imtahan_suallari')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('submodul_id')->references('id')->on('submoduls')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telimlers');
    }
};
