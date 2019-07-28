<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExternalWebsiteToR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('researches', function($table) {
            $table->text('external_link')->nullable();
        });
        Schema::table('projects', function($table) {
            $table->text('external_link')->nullable();
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
        Schema::table('researches', function($table) {
            $table->dropColumn('external_link');
        });
        Schema::table('projects', function($table) {
            $table->dropColumn('external_link');
        });
    }
}
