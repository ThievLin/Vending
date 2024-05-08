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
        Schema::create('tab_vending_machines', function (Blueprint $table) {
            $table->id();
            $table->string('m_name')->nullable();
            $table->tinyInteger('id_customer')->nullable();
            $table->date('installation_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->integer('slot')->nullable();
            $table->string('province')->nullable();
            $table->string('districts')->nullable();
            $table->string('communes')->nullable();
            $table->string('villages')->nullable();
            $table->string('m_image')->nullable();
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
        Schema::dropIfExists('tab_vending_machines');
    }
};
