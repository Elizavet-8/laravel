<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50)->nullable()->default("Liza")->comment("Имя:");
            $table->integer("integer")->default("0")->nullable()->comment("Числа");
            $table->boolean("boolean")->default(false)->comment("Да");
            $table->json("json")->nullable()->comment("Тестовые данные");
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
//            $table->unsignedInteger('user_id')->nullable();
//            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
