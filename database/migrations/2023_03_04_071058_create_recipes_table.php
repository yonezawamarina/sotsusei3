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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->bigInteger('kilocalorie');//カロリー
            $table->tinyInteger('protein'); // タンパク質
            $table->tinyInteger('carbohydrate');//炭水化物
            $table->tinyInteger('vitamin'); // ビタミン
            $table->tinyInteger('fat'); // 脂質
            $table->string('process');
            $table->string('material');
            $table->string('co');
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
        Schema::dropIfExists('recipes');
    }
};
