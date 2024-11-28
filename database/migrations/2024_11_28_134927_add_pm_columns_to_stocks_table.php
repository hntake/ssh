<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPmColumnsToStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('pm_type')->nullable();  // 支払い方法のタイプ（例：visa, mastercard）
            $table->string('pm_last_four', 4)->nullable();  // カード番号の末尾4桁        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn(['pm_type', 'pm_last_four']);
        });
    }
}
