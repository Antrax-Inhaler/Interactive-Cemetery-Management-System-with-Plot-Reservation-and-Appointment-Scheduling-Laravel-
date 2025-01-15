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
        Schema::create('flowers_decoration', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });
        DB::table('flowers_decoration')->insert([
            ['id' => 1, 'description' => 'Lit candles, potted plants, plastic vases, balloons and food are permitted on the grounds.'],
            ['id' => 2, 'description' => 'Decorations hung from trees, plants, or shrubs are NO permitted.'],
            // Add more rows as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flowers_decoration');
    }
};
