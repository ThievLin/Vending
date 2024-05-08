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
        Schema::create('tab_stok_product', function (Blueprint $table) {
            $table->id();
            $table->integer('ware_id')->nullable();
            $table->integer('pro_id')->nullable();
            $table->integer('totalqty')->nullable();
            $table->string('p_name')->nullable();
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
        Schema::dropIfExists('tab_stok_product');
    }
};
