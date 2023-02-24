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
        Schema::create('dog_food', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20); // なまえ
            $table->string('image');//画像
            $table->bigInteger('kilocalorie');//カロリー
            $table->tinyInteger('protein'); // タンパク質
            $table->tinyInteger('carbohydrate');//炭水化物
            $table->tinyInteger('vitamin'); // ビタミン
            $table->tinyInteger('fat'); // 脂質
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
        Schema::dropIfExists('dog_food');
    }
};
