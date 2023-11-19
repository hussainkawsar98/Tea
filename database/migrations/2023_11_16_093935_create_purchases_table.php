<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productname_id');
            $table->unsignedBigInteger('quantity_id');
            $table->double('quantity', 8, 2)->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->double('add_cost', 8, 2)->nullable();
            $table->double('tax', 8, 2)->nullable();
            $table->double('vat', 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('productname_id')->references('id')->on('productnames')->onDelete('cascade');
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
