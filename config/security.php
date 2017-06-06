<?php

return [
    /**
     * clé de sécurité de l'application
     * Peut être régenerer par la commande
     * <code> `php bow generate:key` </code>
     */
    'key' => __DIR__ . '/.key',

    /**
     * la methode Encrypt
     */
    'cipher' => 'AES-256-CBC',

    /**
     * En cas d'utilisation de token. Ceci est le temps de vie d'un token.
     * il est vivement conseil de programmer avec des tokens.
     */
    'token_expirate_time' => 50000
];