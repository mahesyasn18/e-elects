<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("admin_id")->unsigned();
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->onUpdate("cascade");
            $table->string("name");
            $table->integer("harga");
            $table->bigInteger("stok");
            $table->string('file');
            $table->bigInteger("unique_code");
            $table->bigInteger("berat");
            $table->string("color");
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
        Schema::dropIfExists('products');
    }
}
