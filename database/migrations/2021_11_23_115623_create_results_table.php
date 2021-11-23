<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('weight')->default(0)->nullable()->comment("вес");
            $table->integer('hips')->default(0)->nullable()->comment("бёдра");
            $table->integer('waist')->default(0)->nullable()->comment("талия");
            $table->integer('chest')->default(0)->nullable()->comment("грудь");
            $table->foreignId('profile_id')->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('results');
    }
}
