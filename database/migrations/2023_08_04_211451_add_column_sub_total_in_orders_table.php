<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubTotalInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_number',255)->nullable()->after('user_id');
            $table->decimal('sub_total',10,4)->nullable()->after('payment_status');
            $table->decimal('vat',10,4)->nullable()->after('sub_total');
            // $table->decimal('sub_total',10,4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_number');
            $table->dropColumn('sub_total');
            $table->dropColumn('vat');

        });
    }
}
