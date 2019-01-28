<?php

use Bow\Database\Migration\Migration;
use Bow\Database\Migration\SQLGenerator;

class CreateUserTable20190127220017 extends Migration
{
    /**
     * Up Migration
     */
    public function up()
    {
        $this->create("alter", function (SQLGenerator $table) {
            //
        });
    }

    /**
     * Rollback migration
     */
    public function rollback()
    {
        $this->dropIfExists("alter");
    }
}
