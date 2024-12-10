<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDueDateToOrderFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_forms', function (Blueprint $table) {
            $table->date('due_date')->nullable();  
            $table->string('item1')->nullable();  
            $table->string('item2')->nullable();  
            $table->string('item3')->nullable();  
            $table->string('item4')->nullable();  
            $table->string('item5')->nullable();  
            $table->string('item6')->nullable();  
            $table->string('item7')->nullable();  
            $table->string('item8')->nullable();  
            $table->string('item9')->nullable();  
            $table->string('item10')->nullable();   
            $table->string('new_order1')->nullable();  
            $table->string('new_order2')->nullable();  
            $table->string('new_order3')->nullable();  
            $table->string('new_order4')->nullable();  
            $table->string('new_order5')->nullable();  
            $table->string('new_order6')->nullable();  
            $table->string('new_order7')->nullable();  
            $table->string('new_order8')->nullable();  
            $table->string('new_order9')->nullable();  
            $table->string('new_order10')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_forms', function (Blueprint $table) {
            $table->dropColumn(['due_date', 'item1','item2','item3','item4','item5','item6','item7','item8','item9','item10','new_order1','new_order2','new_order3','new_order4','new_order5','new_order6','new_order7','new_order8','new_order9','new_order10']);
        });
    }
}
