<?php

/**
 * @author Franck Dakia <dakiafranckinfo@gmail.com>
 * @package System
 */

namespace System;

Class Artisan
{
    private static $TERM_COLORS = array('black' => "\033[0;30m", 'white' => "\033[1;37m", 'none' => "\033[1;30m", 'dark_grey' => "\033[1;30m", 'light_grey' => "\033[0;37m", 'dark_red' => "\033[0;31m", 'light_red' => "\033[1;31m", 'dark_green' => "\033[0;32m", 'light_green' => "\033[1;32m", 'dark_yellow' => "\033[0;33m", 'light_yellow' => "\033[1;33m", 'dark_blue' => "\033[0;34m", 'light_blue' => "\033[1;34m", 'dark_purple' => "\033[0;35m", 'light_purple' => "\033[1;35m", 'dark_cyan' => "\033[0;36m", 'light_cyan' => "\033[1;36m");
    private static $config = [];
    private static $parameters = [
        "-h" => "--help",
        "-s" => "--select",
        "-c" => "--create-table",
        "-t" => "--trancate",
        "-r" => "--print-router"
    ];

    private $argv;
    private $argc;
    private $param;

    public function __construct($argc, $argv)
    {
        array_shift($argv);

        $cfg = require ".env.php";

        $this->argc = $argc - 1;
        $this->argv = array_splice($argv, 0);

        self::$config =  $cfg["artisan"];

    }

    /**
     * Vide une table passée en parametre
     * @param mixed $arg
     */

    public function truncate($arg)
    {

    }

    public function createTable()
    {

    }


    public function select()
    {

    }

    /**
     * help
     *
     * affichage l'aide de artisan
     */

    public function help()
    {
        $message = [
            "                        Affiche l'aide.",
            "       TABLES | --all Récupére tout les données d'un table.",
            " TABLE          Creation de table.",
            "     TABLES | --all Vider une,une liste ou bien des tables de la configuraton",
            " GET, POST, --all afficher les routes definir dans l'application GET, POST, ALL"
        ];

        $i = 0;
        echo "DESCRIBE: \e[1;31martisan\e[00m permet faire des testes unitaires.\n";
        echo "USAGE: artisan [-s, --select |-t, --truncate | -c, --create-table] [TABLES|--all]\n\n";

        foreach(self::$parameters as $key => $value) {

            echo " ", $key, ", " ,$value, " " ,$message[$i], "\n";
            $i++;

        }
        die();

    }

    /**
     * errorBind
     *
     * log une erreur en console.
     * @param string $param
     */
    private function errorBind($param)
    {

        echo "artisan: undefined parameter {$param}\n\n";
        $this->help();

    }

    /**
     * run
     *
     * lanceur du systeme seul variable globale.
     */
    public function run()
    {

        $parameter_key = array_keys(self::$parameters);

        if ($this->argc > 0) {

            if (!in_array($this->argv[0], $parameter_key) || !in_array($this->argv[0], self::$parameters)) {

                $this->errorBind($this->argv[0]);

            }

            switch($this->argc) {

                case 1:
                    $this->help();
                    break;

                case 2:

                    switch ($this->argv[0]) {

                        case "-s":
                        case "--select":
                            $this->select($this->argv[1]);
                            break;

                        case "-t":
                        case "--truncate":
                            $this->truncate($this->argv[1]);
                            break;

                        case "-c":
                        case "--create-table":
                            $this->createTable($this->argv[1]);
                            break;

                        case "-r":
                        case "--print-router":
                            $this->printRouter($this->argv[1]);
                            break;

                    }

                    break;

                case 3:
                    break;

                default: $this->help();
                    break;

            }

        }

        $this->help();
    }



}
