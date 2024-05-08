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
        Schema::create('tab_slots', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('id_ven_machines')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('product_id')->nullable();
            $table->tinyInteger('pro_id')->nullable();
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
        Schema::dropIfExists('tab_slots');
    }
};
