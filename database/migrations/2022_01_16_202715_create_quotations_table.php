<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
         
            $table->string('customer_name');
            $table->string('county');
            $table->string('address');
            $table->string('phone');
            $table->integer('order_id');
            $table->string('payment_due');
            $table->integer('subtotal');
            $table->integer('total');
            $table->string('terms');
            $table->integer('archive_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
