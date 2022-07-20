<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->bigInteger("no_hp");
            $table->string("alamat");
            $table->string("kecamatan");
            $table->bigInteger("id_provinces")->unsigned();
            $table->foreign("id_provinces")->references("id")->on("provinces")->onDelete("cascade");
            $table->bigInteger("id_cities")->unsigned();
            $table->foreign("id_cities")->references("id")->on("cities")->onDelete("cascade");
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
        Schema::dropIfExists('addresses');
    }
}
