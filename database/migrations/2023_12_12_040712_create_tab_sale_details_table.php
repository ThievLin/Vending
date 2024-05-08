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
        Schema::create('tab_sale_details', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('id_vending_machine')->nullable();
            $table->tinyInteger('id_product_slot')->nullable();
            $table->date('sale_datetime')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('tab_sale_details');
    }
};
