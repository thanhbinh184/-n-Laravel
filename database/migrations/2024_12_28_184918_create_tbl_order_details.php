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
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->unsignedInteger('orders_id');  
            $table->unsignedInteger('product_id');
            $table->string('product_name'); 
            $table->decimal('product_price', 10, 2);
            $table->timestamps();
        
            $table->foreign('orders_id')->references('orders_id')->on('tbl_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('tbl_product')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order_details');
    }
};
