<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTimeInAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('appointment_time')->nullable()->after('appointment_date');
            $table->tinyInteger('purpose')->nullable()->comment('0-discover lebar collections,1-care services')->after('appointment_time');
            $table->tinyInteger('title')->nullable()->comment('0-Mr.,1-Ms.')->after('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('appointment_time');
            $table->dropColumn('purpose');
            $table->dropColumn('title');
        });
    }
}
