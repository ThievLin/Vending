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
        Schema::create('tab_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->tinyInteger('id_vending_machine')->nullable();
            $table->tinyInteger('id_expense_categories')->nullable();
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
        Schema::dropIfExists('tab_expenses');
    }
};
