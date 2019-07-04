<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('awards', function($table) {
            $table->longText('description')->nullable()->change();
        });
        Schema::table('collaborators', function($table) {
            $table->string('logo_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('awards', function($table) {
            $table->longText('description');
        });
        Schema::table('collaborators', function($table) {
            $table->string('logo_url')->nullable()->change();
        });
    }
}
