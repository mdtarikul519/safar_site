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
        Schema::create('schedule_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('secretariate_id')->nullable();
            $table->bigInteger('sakha_id')->nullable();
            $table->bigInteger('schedule_id')->nullable();
           
            $table->integer('amount')->nullable();
            $table->integer('amount_in_bangla')->nullable();
            $table->enum('schedule_status',['pending', 'accepted','canceled'])->default('pending');

            $table->bigInteger('creator')->nullable();
            $table->string('slug',50)->nullable();
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_vouchers');
    }
};
