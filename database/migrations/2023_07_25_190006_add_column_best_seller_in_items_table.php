<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBestSellerInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->tinyInteger('best_seller')->default(0)->comment('0-no,1-yes')->after('is_active');
            $table->tinyInteger('is_sale')->default(0)->comment('0-no,1-yes')->after('best_seller');
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
             $table->dropColumn('best_seller');
             $table->dropColumn('is_sale'); 
        });
    }
}
