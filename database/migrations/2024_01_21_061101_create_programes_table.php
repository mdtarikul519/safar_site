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
        Schema::create('programes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();

            $table->tinyInteger('creator')->nullable();
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
        Schema::dropIfExists('programes');
    }
};
