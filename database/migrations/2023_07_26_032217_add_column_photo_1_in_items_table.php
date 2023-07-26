<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPhoto1InItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('photo_0')->nullable()->after('is_sale');
            $table->string('photo_1')->nullable()->after('photo_0');
            $table->string('photo_2')->nullable()->after('photo_1');
            $table->string('photo_3')->nullable()->after('photo_2');

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
            $table->dropColumn('photo_0');
            $table->dropColumn('photo_1');
            $table->dropColumn('photo_2');
            $table->dropColumn('photo_3');
        });
    }
}
