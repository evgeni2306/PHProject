<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
/*            $table->string('name')->nullable(true);
            $table->string('secondName')->nullable(true);*/
            $table->string('email', 255)->nullable(false)->unique('email');
            $table->string('password', 255)->nullable(false);
            $table->string('remember_token', 100)->nullable(true);
/*            $table->date('dateOfBirth')->nullable(true);
            $table->string('photo')->nullable('true');
            $table->integer('roleId')->nullable(true);
            $table->boolean('status')->nullable(true);
            $table->boolean('online')->nullable(true);*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
