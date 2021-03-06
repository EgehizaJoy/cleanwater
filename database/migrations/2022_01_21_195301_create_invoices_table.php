<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('county');
            $table->string('address');
            $table->string('phone');
            $table->integer('order_id');
            $table->string('paid_date');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->string('mpesa_id');
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
        Schema::dropIfExists('invoices');
    }
}
