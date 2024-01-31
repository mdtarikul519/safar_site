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
        Schema::create('secretariate_active_statuses', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('schedule_id')->nullable();
            $table->dateTime('post_date')->nullable();
            $table->enum('active_status', ['free', 'busy', 'in_shedule'])->default('free');
            $table->dateTime('busy_start')->nullable();
            $table->dateTime('busy_end')->nullable();
            $table->dateTime('when_free')->nullable();
            $table->text('description')->nullable();

            $table->tinyInteger('creator')->nullable();
            $table->string('slug', 50)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretariate_active_statuses');
    }
};
