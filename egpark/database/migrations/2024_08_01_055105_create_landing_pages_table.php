<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLandingPagesTable extends Migration
{
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // Store the path to the logo
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Seed initial data
        DB::table('landing_pages')->insert([
            'logo' => '/img/4.svg', // Default logo path
            'address' => '123 Example Street',
            'contact' => '1234567890',
            'email' => 'example@example.com',
            'description' => 'This is a description of the landing page.',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('landing_pages');
    }
}
