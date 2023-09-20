<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
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
            $table->decimal('ledger_main', 12, 6)->nullable();
            $table->decimal('ledger_altcoins', 12, 6)->nullable();
            $table->decimal('coinbase', 12, 6)->nullable();
            $table->decimal('binance', 12, 6)->nullable();
            $table->decimal('multivers_x', 12, 6)->nullable();
            $table->decimal('crypto_com', 12, 6)->nullable();
            $table->decimal('metamask', 12, 6)->nullable();
            $table->decimal('trust_wallet', 12, 6)->nullable();
            $table->decimal('etoro', 12, 6)->nullable();
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
