<?php

return [
    /**
     * Security key of the application
     * Can be reorder by the command
     * <code>`php bow generate:key`</code>
     */
    'key' => __DIR__.'/.key',

    /**
     * The Encrypt method
     */
    'cipher' => 'AES-256-CBC',

    /**
     * When using token. This is the life time of a token.
     * It is strongly advised to program with tokens.
     */
    'token_expirate_time' => 50000
];
