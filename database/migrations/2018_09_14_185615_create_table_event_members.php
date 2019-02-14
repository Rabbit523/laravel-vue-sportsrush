<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->nullable() ;
            $table->integer('team_id')->nullable() ;
            $table->integer('member_id')->nullable() ;
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
        Schema::dropIfExists('event_members');
    }
}
