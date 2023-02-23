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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id'); //Add:user_id
            $table->string('name', 20); // なまえ
            $table->boolean('gender'); // 性別
            $table->tinyInteger('age'); // 年齢
            $table->tinyInteger('weight'); // 体重
            $table->boolean('fix'); // ライフステージ
            $table->bigInteger('daykcl'); // 必要カロリー
            $table->foreignId('dog_breed_id');
            $table->foreignId('dog_food_id');
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
        Schema::dropIfExists('dogs');
    }
};
