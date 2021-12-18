<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('email');
            $table->string('second_name')->after('email');
            $table->string('city')->after('email');
            $table->string('county')->after('email');
            $table->string('zip')->after('email');
            $table->dropColumn('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('second_name');
            $table->dropColumn('city');
            $table->dropColumn('county');
            $table->dropColumn('zip');
            $table->string('name');
        });
    }
}
