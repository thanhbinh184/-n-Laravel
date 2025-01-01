<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->Increments('orders_id');
            $table->Integer('customers_id')->unsigned();
            $table->Integer('shipping_id')->unsigned();
	        $table->string('orders_status')->default('pending'); 
            $table->decimal('total_price', 10, 2)->default(0); 
            $table->date('order_date'); 
	        $table->timestamps();
	
           $table->foreign('customers_id')->references('customers_id')->on('tbl_customers')->onDelete('cascade');
           $table->foreign('shipping_id')->references('shipping_id')->on('tbl_shipping')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_orders');
    }
};
