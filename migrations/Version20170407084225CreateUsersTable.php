<?php

use Bow\Database\Migration\Migration;
use Bow\Database\Migration\SQLGenerator;

class Version20170407084225CreateUsersTable extends Migration
{
    /**
     * Up Migration
     */
    public function up()
    {
        $this->create("users", function (SQLGenerator $table) {
            $table->addIncrement('id');
            $table->addString('name');
            $table->addString('email', ['unique' => true]);
            $table->addString('description');
            $table->addString('password');
            $table->addTimestamps();
            $table->withEngine('InnoDB');
        });
    }

    /**
     * Rollback migration
     */
    public function rollback()
    {
        $this->dropIfExists("users");
    }
}
