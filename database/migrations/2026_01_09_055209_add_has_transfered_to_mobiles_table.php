<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHasTransferedToMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiles', function (Blueprint $table) {
             $table->boolean('has_transfered')
              ->default(false)->nullable()
              ->after('is_transfer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            //
        });
    }
}
