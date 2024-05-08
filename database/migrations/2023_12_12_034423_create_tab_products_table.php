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
        Schema::create('tab_products', function (Blueprint $table) {
            $table->id();
            $table->string('p_name')->nullable();
            $table->tinyInteger('id_pro_categories')->nullable();
            $table->date('expiry_date')->nullable();
            $table->text('specific_code')->nullable();
            $table->string('status')->nullable();
            $table->string('p_image')->nullable();

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
        Schema::dropIfExists('tab_products');
    }
};
