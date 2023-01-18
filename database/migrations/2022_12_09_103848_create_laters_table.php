<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('later_test')->nullable();
            $table->string('later_test_type');
            $table->string('later_test_textbook');
            $table->string('later_test_name');
            $table->string('created_user');
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
        Schema::dropIfExists('laters');
    }
}
