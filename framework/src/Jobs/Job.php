<?php

namespace Bow\Jobs;

class Job
{
    /**
     * @var string
     */
    protected $queue = 'default';

    /**
     * The job handle
     */
    public function handler()
    {
        //
    }
    
    public function dispatch()
    {

    }
}
