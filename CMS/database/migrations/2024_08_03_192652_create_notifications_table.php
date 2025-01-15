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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['reservation', 'appointment', 'transaction', 'user']);
            $table->unsignedBigInteger('item_id');
            $table->string('message');
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->string('admin_message')->nullable(); // New column for admin-specific message
            $table->boolean('is_read_admin')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
