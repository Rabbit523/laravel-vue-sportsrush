<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable() ;
            $table->longText('details')->nullable() ;
            $table->string('type')->nullable() ;
            $table->string('country')->nullable() ;
            $table->string('state')->nullable() ;
            $table->string('city')->nullable() ;
            $table->string('zip')->nullable() ;
            $table->string('area')->nullable() ;
            $table->string('access_type')->nullable() ;
            $table->longText('img_url')->nullable() ;
            $table->timestamps();
            $table->softDeletes() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
