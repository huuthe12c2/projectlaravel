<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping_table', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->integer('cuctomer_id');
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_andress');
            $table->string('shipping_phone');
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
        Schema::dropIfExists('tbl_shipping_table');
    }
}
