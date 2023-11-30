<?php
// create_puzzles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuzzlesTable extends Migration
{
    public function up()
    {
        Schema::create('puzzles', function (Blueprint $table) {
            $table->id();
            $table->integer('size'); // ピースのサイズ
            // その他のピースに関連する情報を追加する場合はここにカラムを追加
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puzzles');
    }
}
