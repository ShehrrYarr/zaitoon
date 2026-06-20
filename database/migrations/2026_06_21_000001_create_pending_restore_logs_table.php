<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingRestoreLogsTable extends Migration
{
    public function up()
    {
        Schema::create('pending_restore_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobile_id');
            $table->unsignedBigInteger('restored_by');
            $table->decimal('old_cost_price', 10, 2)->nullable();
            $table->decimal('new_cost_price', 10, 2)->nullable();
            $table->decimal('old_selling_price', 10, 2)->nullable();
            $table->decimal('new_selling_price', 10, 2)->nullable();
            $table->string('old_battery_health')->nullable();
            $table->string('new_battery_health')->nullable();
            $table->timestamps();

            $table->foreign('mobile_id')->references('id')->on('mobiles')->onDelete('cascade');
            $table->foreign('restored_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pending_restore_logs');
    }
}
