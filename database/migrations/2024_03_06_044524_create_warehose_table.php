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
        Schema::create('warehose', function (Blueprint $table) {
            $table->id();
            $table->string('supp_name')->nullable();
            $table->string('location')->nullable();
            $table->string('pro_name')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('uom')->nullable();
            $table->integer('pro_id')->nullable();
            

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
        Schema::dropIfExists('warehose');
    }
};
