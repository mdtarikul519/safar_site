<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule_been_cancelds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schedule_id')->nullable();
            $table->bigInteger('secretariate_id')->nullable();
            $table->bigInteger('sakha_id')->nullable();
            $table->text('cancel_comment')->nullable();  
            
            
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
        Schema::dropIfExists('schedule_been_cancelds');
    }
};
