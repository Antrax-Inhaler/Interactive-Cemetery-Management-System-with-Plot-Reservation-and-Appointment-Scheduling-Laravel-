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
        Schema::create('plots', function (Blueprint $table) {
            $table->id('plot_id');
            $table->integer('block_no')->nullable();
            $table->string('plot_number')->nullable();
            $table->string('lot_owner')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('status')->nullable();
            $table->string('occupant_name')->nullable();
            $table->string('occupant_address')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->date('interment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
