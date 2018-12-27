<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificationToPublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('publications', function($table) {
            $table->string('conference')->nullable();
            $table->string('conference_url')->nullable();
            $table->integer('citations')->nullable();
            $table->string('paper_url')->nullable();
            $table->dropColumn('description');
            $table->dropColumn('doi');
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
        Schema::table('publications', function($table) {
            $table->dropColumn('conference')->nullable();
            $table->dropColumn('conference_url')->nullable();
            $table->dropColumn('citations')->nullable();
            $table->dropColumn('paper_url');
            $table->text('description');
            $table->string('doi');
        });
    }
}
