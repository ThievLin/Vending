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
        Schema::create('tab_product_slot', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('id_slots')->nullable();
            $table->tinyInteger('id_products')->nullable();
            $table->integer('quantity_add')->nullable();
            $table->date('datetime')->nullable();
            $table->string('status')->nullable();
            $table->integer('slot_num')->nullable();
            $table->integer('inventory_id')->nullable();
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
        Schema::dropIfExists('tab_product_slot');
    }
};
