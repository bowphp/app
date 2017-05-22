<?php
use \Bow\Database\Migration\Fields;
use \Bow\Database\Migration\Schema;
use \Bow\Database\Migration\Migration;

class CreateUsersTable extends Migration
{
    /**
     * create Table
     */
    public function up()
    {
        Schema::create("users", function(Fields $table) {
            $table->increment('id');
            $table->string('name');
            $table->string('description');
            $table->string('email')->unique();
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Drop Table
     */
    public function down()
    {
        Schema::drop("users");
    }
}