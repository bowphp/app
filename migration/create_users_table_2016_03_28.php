<?php

use \Vap\Database\Migration\Schema;
use \Vap\Database\Migration\Migration;
use \Vap\Database\Migration\TableColumnsMaker;
use \Vap\Database\Migration\AlterTable as Alter;

class CreateUsersTable extends Migration
{
    /**
     * create users table
     */
    public function up()
    {
        Schema::create("users", function(TableColumnsMaker $table) {
            $table->increment("id");
            $table->string("name");
            $table->string("lastname");
            $table->string("email")->unique();
            $table->string("description", 500);
        });

        Schema::fillTable(10);
    }

    /**
     * drop a table users
     */
    public function down()
    {
        Schema::drop("users");
    }
}