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
        Schema::create('tab_pro_slot', function (Blueprint $table) {
            $table->id();
            $table->integer('slot_id')->nullable();
            $table->integer('pro_id')->nullable();
            $table->integer('QTY')->nullable();
            $table->integer('ware_id')->nullable();
            $table->integer('to_refill')->nullable();
            $table->integer('slot_num')->unsigned()->nullable();
            $table->integer('id_sale_details')->nullable();
            $table->integer('slot')->nullable();
            $table->date('date')->nullable();
            $table->string('adddress')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('tab_pro_slot');
    }
};
