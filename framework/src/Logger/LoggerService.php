<?php

namespace \Bow\Logger;

use Bow\Application\Services as BowService;

class LoggerService extends BowService
{
	/**
	 * @var Logger
	 */
	private $logger;

    /**
     * Permet de créer le service
     *
     * @param Config $config
     * @param Config $config
     */
    public function make(Config $config = null)
    {
    	$this->logger = new Logger($config['app.mode'], $config['resource.log']);
    }

    /**
     * Permet de lancer le service
     *
     * @return mixed
     */
    public function start()
    {
    	$this->logger->register();
    }
}