<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->comment('id of users table');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('order_type')->default(0)->comment('0-normal,1-make');
            $table->tinyInteger('order_status')->default(0)->comment('0-pending,1-received,2-shipped,3-success,4-canceled');
            $table->decimal('order_total',10,4)->nullable();
            $table->string('shipping_address_first_name')->nullable();
            $table->string('shipping_address_last_name')->nullable();
            $table->string('shipping_address_1')->nullable();
            $table->string('shipping_address_2')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postcode')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_contact')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
