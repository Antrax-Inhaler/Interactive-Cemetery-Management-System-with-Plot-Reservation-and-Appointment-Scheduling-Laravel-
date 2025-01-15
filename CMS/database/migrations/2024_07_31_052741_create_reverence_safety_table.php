<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reverence_safety', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });
        DB::table('reverence_safety')->insert([
            ['id' => 1, 'description' => 'While visiting, we ask for quiet and reverence. Loud and abusive conduct is not allowed, and alcohol is never permitted.'],
            ['id' => 2, 'description' => 'Children under 16 must be accompanied by an adult at all times and must NEVER be left alone in vehicles.'],
            // Add more rows as needed
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reverence_safety');
    }
};
