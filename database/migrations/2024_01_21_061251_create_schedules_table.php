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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shakha_id')->nullable();
            $table->string('sakha', 100)->nullable();

            $table->dateTime('present_time')->nullable();
            $table->dateTime('leave_time')->nullable();
            $table->dateTime('time_of_present_in_own_address')->nullable();

            $table->dateTime('program_start_time')->nullable();
            $table->dateTime('program_end_time')->nullable();

            $table->string('how_many_programs', 100)->nullable();
            $table->Integer('program_ids')->nullable();
            $table->enum('program_type',['online','ofline'])->default('online');
            
            $table->integer('deligate_amount')->nullable();
            $table->string('deligate_type', 100)->nullable();
            
            $table->string('topics', 100)->nullable();
            $table->bigInteger('secretariate_id')->nullable();
            $table->enum('schedule_status',['pending',
             'accepted_by_admin',
             'accepted_by_secretariate', 
             'rejected_by_secretariate',
             'completed',
             'canceled'])->default('pending');
            $table->string('secretariate_comment', 150)->nullable();

                
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
        Schema::dropIfExists('schedules');
    }
};
