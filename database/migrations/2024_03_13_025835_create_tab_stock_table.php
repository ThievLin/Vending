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
        Schema::create('tab_stock', function (Blueprint $table) {
            $table->id();
            $table->string('supp_name')->nullable();
            $table->string('location')->nullable();
            $table->string('source')->nullable();
            $table->date('received_date')->nullable();
            $table->integer('supp_id')->nullable();
            $table->json('pro_id')->nullable();
            $table->json('qty')->nullable();
            $table->json('price')->nullable();
            $table->json('subtotal')->nullable();
            $table->json('uom')->nullable();
            $table->integer('ware_id')->nullable();
            $table->json('totalqty')->nullable();
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
        Schema::dropIfExists('tab_stock');
    }
};
