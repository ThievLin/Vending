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
        Schema::create('tab_warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_name')->nullable();
            $table->string('location')->nullable();
            $table->string('province')->nullable();
            $table->string('districts')->nullable();
            $table->string('communes')->nullable();
            $table->string('villages')->nullable();
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
        Schema::dropIfExists('tab_warehouse');
    }
};
