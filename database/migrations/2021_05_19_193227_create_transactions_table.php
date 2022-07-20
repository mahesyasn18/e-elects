<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("nama");
            $table->string("no_hp", 50);
            $table->string("alamat");
            $table->string("total");
            $table->string("ongkir");
            $table->string("kecamatan");
            $table->foreignId("cities_id");
            $table->foreign("cities_id")->references("id")->on("cities")->onDelete("cascade");
            $table->foreignId("tag_id");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");
            $table->string("ispaid");
            $table->dateTime("expiry_date");
            $table->string("invoice")->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
