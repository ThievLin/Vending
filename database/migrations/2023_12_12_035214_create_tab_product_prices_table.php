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
        Schema::create('tab_product_prices', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('id_products')->nullable();
            $table->float('price_in')->nullable();
            $table->float('price_out')->nullable();
            $table->tinyInteger('id_pro_season')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('product_id')->nullable();

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
        Schema::dropIfExists('tab_product_prices');
    }
};
