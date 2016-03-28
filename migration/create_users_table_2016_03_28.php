<?php

use \Bow\Database\Migration\Schema;
use \Bow\Database\Migration\Blueprint;
use \Bow\Database\Migration\Migration;

class CreateUsersTable extends Migration
{
    /**
     * create users table
     */
    public function up()
    {
        Schema::create("users", function(Blueprint $table) {
            $table->autoincrements("id");
            $table->string("name");
            $table->string("lastname");
            $table->string("email")->unique();
            $table->string("description", 500);
        });
    }

    /**
     * drop a table users
     */
    public function down()
    {
        Schema::drop("users");
    }
}