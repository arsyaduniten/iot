<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('user_sns', function($table) {
            $table->dropColumn('user_id');
            $table->dropColumn('icon_url');
            $table->renameColumn('link', 'url');
            $table->renameColumn('name', 'display_name');
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
        Schema::table('user_sns', function($table) {
            $table->integer('user_id')->unsigned();
            $table->string('icon_url');
            $table->renameColumn('url', 'link');
            $table->renameColumn('display_name', 'name');
        });

    }
}
