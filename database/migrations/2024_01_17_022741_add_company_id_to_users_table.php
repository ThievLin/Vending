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
        Schema::table('tab_location', function (Blueprint $table) {
            $table->unsignedBigInteger('company_info_id')->nullable();
            $table->foreign('company_info_id')->references('id')->on('tab_company_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_location', function (Blueprint $table) {
            //
        });
    }
};
