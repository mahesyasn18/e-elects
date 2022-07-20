<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("product_id")->unsigned();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
            $table->string("announced");
            $table->string("OS");
            $table->longText("display");
            $table->longText("chipset");
            $table->longText("camera");
            $table->longText("sensors");
            $table->longText("battery");
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
        Schema::dropIfExists('products_details');
    }
}
