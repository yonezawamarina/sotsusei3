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
        Schema::create('dogfoods', function (Blueprint $table) {
            $table->id();
            $table->string('dogfoodname', 20); // なまえ
            $table->bigInteger('kcal');//カロリー
            $table->tinyInteger('tanpakushitsu'); // タンパク質
            $table->tinyInteger('tansuikabutsu');//炭水化物
            $table->tinyInteger('vitamin'); // ビタミン
            $table->tinyInteger('shishitsu'); // 脂質
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
        Schema::dropIfExists('dogfoods');
    }
};
