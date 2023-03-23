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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->String('first_name');
            $table->string('last_name');
            $table->String('phone')->nullable();
            $table->String('address1', 255);
            $table->String('address2', 255);
            $table->String('city', 255);
            $table->String('state', 45)->nullable();
            $table->string('zip_code', 45);
            $table->string('country_code', 3);
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
        Schema::dropIfExists('order_details');
    }
};
