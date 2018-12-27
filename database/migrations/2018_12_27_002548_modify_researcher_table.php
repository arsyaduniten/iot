<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResearcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('researchers', function($table) {
            $table->dropColumn('image_url');
            $table->dropColumn('last_name');
            $table->renameColumn('first_name', 'fullname');
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
        $table->string('image_url');
        $table->string('last_name');
        $table->renameColumn('fullname', 'first_name');
    }
}
