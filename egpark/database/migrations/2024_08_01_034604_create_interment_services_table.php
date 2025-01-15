<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateIntermentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interment_services', function (Blueprint $table) {
            $table->id();
            $table->decimal('price_for_non_senior', 10, 2);
            $table->decimal('price_for_senior', 10, 2);
            $table->decimal('price_for_transfer_of_bones', 10, 2);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('interment_services')->insert([
            'price_for_non_senior' => 5000.00,
            'price_for_senior' => 4000.00,
            'price_for_transfer_of_bones' => 3000.00
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interment_services');
    }
}
