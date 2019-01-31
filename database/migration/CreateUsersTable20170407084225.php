<?php

use Bow\Database\Migration\Migration;
use Bow\Database\Migration\SQLGenerator;

class CreateUsersTable20170407084225 extends Migration
{
    /**
     * Up migration
     */
    public function up()
    {
        $this->create("users", function (SQLGenerator $table) {
            $table->addColumn('id', 'int', [
                'increment' => true,
                'primary' => true
            ]);
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
     */
    public function down()
    {
        $this->dropIfExists("users");
    }
}
