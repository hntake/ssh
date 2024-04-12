<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('type1')->nullable();
            $table->string('type2')->nullable();
            $table->string('type3')->nullable();
            $table->string('type4')->nullable();
            $table->string('type5')->nullable();
            $table->string('type6')->nullable();
            $table->string('type7')->nullable();
            $table->string('type8')->nullable();
            $table->string('type9')->nullable();
            $table->string('type10')->nullable();
            $table->string('company_name')->nullable();
            $table->string('postal_number')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('company_number')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
