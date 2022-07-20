<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->foreignId("transactions_id");
            $table->foreignId("product_id");
            $table->foreign("transactions_id")->references("id")->on("transactions")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
            $table->integer("qty");
            $table->integer("price");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
