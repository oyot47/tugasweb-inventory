<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSatuanIdFromBarangsTable extends Migration
{
    public function up()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('satuan_id');
        });
    }

    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->unsignedBigInteger('satuan_id')->nullable();
        });
    }
}

