<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule_voucher_canceleds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schedule_id')->nullable();
            $table->bigInteger('secretariate_id')->nullable();
            $table->bigInteger('sakha_id')->nullable();
            $table->string('cancel_comment', 150)->nullable();
            $table->enum('status',['pending', 'approve', 'canceled'])->default('pending');  

            $table->bigInteger('creator')->nullable();
            $table->string('slug',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_voucher_canceleds');
    }
};


