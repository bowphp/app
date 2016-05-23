<?php

use \Bow\Database\Migration\Schema;
use \Bow\Database\Migration\Migration;
use \Bow\Database\Migration\ColumnsMaker;
use \Bow\Database\Migration\AlterTable as Alter;

class CreateUsersTable extends Migration
{
    /**
     * create users table
     */
    public function up()
    {
        Schema::create("users", function(ColumnsMaker $table) {
            $table->increment("id");
            $table->string("name");
            $table->string("lastname");
            $table->string("email")->unique();
            $table->string("description", 500);
        });

        Schema::fillTable(10, "name|i:1;lastname|s:90;email|s:30;description|s:39");
    }

    /**
     * drop a table users
     */
    public function down()
    {
        Schema::drop("users");
    }
}