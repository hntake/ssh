<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('tax1')->default(0);
            $table->string('tax2')->default(0);
            $table->string('tax3')->default(0);
            $table->string('tax4')->default(0);
            $table->string('tax5')->default(0);
            $table->string('tax6')->default(0);
            $table->string('tax7')->default(0);
            $table->string('tax8')->default(0);
            $table->string('tax9')->default(0);
            $table->string('tax10')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('tax1');
            $table->dropColumn('tax2');
            $table->dropColumn('tax3');
            $table->dropColumn('tax4');
            $table->dropColumn('tax5');
            $table->dropColumn('tax6');
            $table->dropColumn('tax7');
            $table->dropColumn('tax8');
            $table->dropColumn('tax9');
            $table->dropColumn('tax10');

        });
    }
}
