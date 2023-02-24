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
            $table->foreignId('dog_breed_id');
            $table->foreignId('life_stage_id');
            // $table->foreignId('dog_food_id');
            $table->string('name', 20); // なまえ
            $table->tinyInteger('weight'); // 体重
            $table->boolean('gender'); // 性別
            $table->tinyInteger('age'); // 年齢
            // $table->boolean('fix'); // ライフステージ//ゆくゆく消す
            // $table->bigInteger('daycalorie'); // 必要カロリー//ゆくゆく消す
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
