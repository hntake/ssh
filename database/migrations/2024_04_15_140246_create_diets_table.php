<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_pronunciation');
            $table->string('party');
            $table->string('area');
            $table->string('birthDay');
            $table->string('type')->nullable();
            $table->string('bribe')->default(0);
            $table->string('cult')->default(0);
            $table->string('link')->default(0);

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
        Schema::dropIfExists('diets');
    }
}
