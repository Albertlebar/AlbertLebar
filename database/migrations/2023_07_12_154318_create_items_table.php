<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index()->comment('id of categories table');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('item_code', 255);
            $table->string('item_description', 255);
            $table->string('supplier_name', 255);
            $table->string('supplier_code', 255);
            $table->decimal('gold_price',10,4)->nullable();
            $table->decimal('stone_price',10,4)->nullable();
            $table->decimal('labour_cost',10,4)->nullable();
            $table->decimal('duty_and_extra',10,4)->nullable();
            $table->decimal('total_cost',10,4)->nullable();
            $table->decimal('profit_trade',10,4)->nullable()->comment('value in %');
            $table->decimal('profit_retail',10,4)->nullable()->comment('value in %');
            $table->decimal('total_trade',10,4)->nullable()->comment('value in pound');
            $table->decimal('total_retail',10,4)->nullable()->comment('value in pound');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}
