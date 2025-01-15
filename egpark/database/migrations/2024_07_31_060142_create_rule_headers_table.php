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
    public function up()
    {
        Schema::create('rule_headers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('greetings');
            $table->text('description');
            $table->text('subdescription');
            $table->timestamps();
        });
        DB::table('rule_headers')->insert([
            'title' => 'PARK RULES',
            'greetings' => 'Thank you for helping us keep Greenpark as a Special Gathering Place',
            'description' => 'We know that among many reasons, you chose Greenpark Memorial Garden for the beauty, meticulously landscaped grounds, and peacefulness it provides.',
            'subdescription' => 'For this reason, and in order to preserve its consistency and harmony, we’ve set forth a list of guidelines. These will be enforced as a way to protect the safety of our visitors, the sanctity of each lot, and the beautiful gardens. We appreciate everyone’s cooperation.',
            'created_at' => now(), // Optional, but useful for tracking
            'updated_at' => now(), // Optional, but useful for tracking
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule_headers');
    }
};
