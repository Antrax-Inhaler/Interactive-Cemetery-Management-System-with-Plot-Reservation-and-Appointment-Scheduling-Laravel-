<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLawnLotPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawn_lot_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->string('size');
            $table->decimal('downpayment', 10, 2);
            $table->decimal('installment', 10, 2);
            $table->decimal('discount_for_cash_basis', 5, 2);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('lawn_lot_prices')->insert([
            'price' => 5000.00,
            'size' => 'Small',
            'downpayment' => 1000.00,
            'installment' => 200.00,
            'discount_for_cash_basis' => 5.00
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawn_lot_prices');
    }
}
