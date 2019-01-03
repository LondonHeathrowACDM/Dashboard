<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeparturesTable extends Migration
{
    /**
     * Run the cards table migrations.
     * Creates the `cards` table and structure
     * @return void
     */
    public function up()
    {
        Schema::create('departures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('callsign');
            $table->string('sid')->default('');
            $table->string('tot')->default('');
            $table->boolean('clrd')->default(false);
            $table->string('destination');
            $table->longText('route');
            $table->integer('altitude');
            $table->float('longitude')->default(null);
            $table->float('latitude')->default(null);
            $table->boolean('correctRoute')->default(false);
            $table->timestamp('online_since');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departures');
    }
}

