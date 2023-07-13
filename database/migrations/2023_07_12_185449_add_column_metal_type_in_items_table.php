<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMetalTypeInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->tinyInteger('metal_type')->nullable()->after('supplier_code')->comment('0=9K,1=18K,2=platinum');
            $table->tinyInteger('metal_colour')->nullable()->after('metal_type')->comment('0=white,1=yellow,2=red,3-mix');
            $table->decimal('total_gold_weight',10,4)->nullable()->after('metal_colour');
            $table->decimal('total_ct_weight',10,4)->nullable()->after('total_gold_weight');
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
            $table->dropColumn('metal_type');
            $table->dropColumn('metal_colour');
            $table->dropColumn('total_gold_weight');
            $table->dropColumn('total_ct_weight');
        });
    }
}
