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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('symbol');
            $table->decimal('ledger_main')->nullable();
            $table->decimal('ledger_altcoins')->nullable();
            $table->decimal('coinbase')->nullable();
            $table->decimal('binance')->nullable();
            $table->decimal('multivers_x')->nullable();
            $table->decimal('crypto_com')->nullable();
            $table->decimal('metamask')->nullable();
            $table->decimal('trust_wallet')->nullable();
            $table->decimal('etoro')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
};
