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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100)->nullable();
            $table->string('user_name', 100)->nullable();
            $table->enum('role_name',['admin','cp', 'sg', 'xcp','branch','sakha_cup_member','secretariate','external', 'user'])->default('admin');
            $table->string('telegram_name', 45)->nullable();
            $table->string('telegram_id', 15)->nullable();
            $table->string('image', 150)->nullable();

            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->bigInteger('creator')->nullable();
            $table->string('slug',50)->nullable();
            $table->tinyInteger('status')->default(1);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
