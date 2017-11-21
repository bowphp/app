<?php

namespace \Bow\Logger;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Bow\Application\Services as BowService;

class LoggerService extends BowService
{
    /**
     * @var mixed
     */
    private $whoops;

    /**
     * @var mixed
     */
    private $monolog;

    /**
     * Permet de créer le service
     *
     * @param Config $config
     * @param Config $config
     */
    public function make(Config $config = null)
    {
        $this->whoops = new \Whoops\Run;
        // Create the logger
        $this->logger = new Logger('BOW');
    }

    /**
     * Permet de lancer le service
     *
     * @return mixed
     */
    public function start()
    {
        $this->whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $this->whoops->register();
        
        $this->logger->pushHandler(new StreamHandler($config['resource.log'], Logger::DEBUG));
        $this->logger->pushHandler(new FirePHPHandler());
    }
}