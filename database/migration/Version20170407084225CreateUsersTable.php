<?php

use Bow\Database\Migration\Migration;
use Bow\Database\Migration\SQLGenerator;

class Version20170407084225CreateUsersTable extends Migration
{
    /**
     * Up migration
     * 
     * @return void
     */
    public function up()
    {
        $this->create("users", function (SQLGenerator $table) {
            $table->addColumn('id', 'int', ['increment' => true, 'primary' => true]);
            $table->addColumn('name', 'string');
            $table->addColumn('description', 'string');
            $table->addColumn('email', 'string');
            $table->addColumn('pseudo', 'string');
            $table->addColumn('password', 'string');
            $table->addTimestamps();
            $table->withEngine('InnoDB');
        });
    }

    /**
     * Rollback migration
     * 
     * @return void
     */
    public function rollback()
    {
        $this->dropIfExists("users");
    }
}
