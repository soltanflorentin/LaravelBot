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
        Schema::create('buy_trades', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->decimal('buy_price');
            $table->decimal('usd_value');
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
        Schema::dropIfExists('buy_trades');
    }
};
