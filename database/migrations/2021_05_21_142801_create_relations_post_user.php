<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsPostUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->bigInteger('CreatorId')->change();
            $table->bigInteger('OwnerId')->change();
            $table->bigInteger('CreatorId')->unsigned()->default(1)->change();
            $table->foreign('CreatorId')->references('id')->on('users')->change();
            $table->bigInteger('OwnerId')->unsigned()->default(1)->change();
            $table->foreign('OwnerId')->references('id')->on('users')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('CreatorId')->change();
            $table->integer('OwnerId')->change();
        });

    }
}
