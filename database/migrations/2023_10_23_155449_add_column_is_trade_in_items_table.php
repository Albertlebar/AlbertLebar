<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsTradeInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->tinyInteger('is_trade')->comment('0-no,1-yes')->default(1)->after('is_sale');
            $table->tinyInteger('is_retailer')->comment('0-no,1-yes')->default(1)->after('is_trade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('is_trade');
            $table->dropColumn('is_retailer');
        });
    }
}
