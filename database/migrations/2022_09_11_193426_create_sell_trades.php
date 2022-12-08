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
        Schema::create('sell_trades', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->decimal('sell_price');
            $table->decimal('sell_profit'); 
            $table->unsignedBigInteger('buy_id'); 
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
        Schema::dropIfExists('sell_trades');
    }
};
