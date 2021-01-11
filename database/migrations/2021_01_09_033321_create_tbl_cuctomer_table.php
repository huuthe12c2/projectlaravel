<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCuctomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cuctomer', function (Blueprint $table) {
            $table->Increments('cuctomer_id');
            $table->string('cuctomer_name');
            $table->string('cuctomer_email');
            $table->string('cuctomer_password');
            $table->string('cuctomer_phone');
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
        Schema::dropIfExists('tbl_cuctomer');
    }
}
