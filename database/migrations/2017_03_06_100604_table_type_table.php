<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_table', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('type_machine')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_table', function (Blueprint $table) {
            //
        });
    }
}
