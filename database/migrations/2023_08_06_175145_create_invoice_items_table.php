<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id')->index()->comment('id of invoices table');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->unsignedBigInteger('item_id')->index()->comment('id of items table');
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('quantity')->nullable();
            $table->string('size')->nullable();
            $table->decimal('price',10,4)->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
}
