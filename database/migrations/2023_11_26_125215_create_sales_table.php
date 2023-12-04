<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->unsignedBigInteger('product_id');
            $table->integer('productname_id');
            $table->double('quantity', 8, 2);
            $table->double('single_price', 8, 2);
            $table->double('price', 8, 2)->nullable();
            $table->double('add_cost', 8, 2)->nullable();
            $table->double('vat', 8, 2)->nullable();
            $table->double('tax', 8, 2)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('product_sales', function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
