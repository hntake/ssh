<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('textbook')->index();
            $table->string('test_name');
            $table->string('user_name')->index();
            $table->string('ja1');
            $table->string('ja2');
            $table->string('ja3');
            $table->string('ja4');
            $table->string('ja5');
            $table->string('ja6');
            $table->string('ja7');
            $table->string('ja8');
            $table->string('ja9');
            $table->string('ja10');
            $table->string('en1');
            $table->string('en2');
            $table->string('en3');
            $table->string('en4');
            $table->string('en5');
            $table->string('en6');
            $table->string('en7');
            $table->string('en8');
            $table->string('en9');
            $table->string('en10');
            $table->integer('count')->default(0);
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
        Schema::dropIfExists('words');
    }
}
