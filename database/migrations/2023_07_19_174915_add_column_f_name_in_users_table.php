<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFNameInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('f_name')->nullable()->after('name');
            $table->string('l_name')->nullable()->after('f_name');
            $table->string('company')->nullable()->after('email');
            $table->string('address_field_1')->nullable()->after('company');
            $table->string('address_field_2')->nullable()->after('address_field_1');
            $table->string('city')->nullable()->after('address_field_2');
            $table->string('country')->nullable()->after('city');
            $table->string('state_province_county')->nullable()->after('country');
            $table->string('postcode')->nullable()->after('state_province_county');
            $table->string('telephone')->nullable()->after('postcode');
            $table->string('mobile')->nullable()->after('telephone');
            $table->string('vat_number')->nullable()->after('mobile');
            $table->string('refrences')->nullable()->after('vat_number');
            $table->tinyInteger('user_type')->default(0)->comment('0-Trade,1-Retailer')->after('refrences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('f_name');
            $table->dropColumn('l_name');
            $table->dropColumn('company');
            $table->dropColumn('address_field_1');
            $table->dropColumn('address_field_2');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('state_province_county');
            $table->dropColumn('postcode');
            $table->dropColumn('telephone');
            $table->dropColumn('mobile');
            $table->dropColumn('vat_number');
            $table->dropColumn('refrences');
            $table->dropColumn('user_type');
        });
    }
}
