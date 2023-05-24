<?php

return [
    "signkey" => app_env("APP_JWT_SECRET", "FivwuTmpJlwfXB/WMjAyMS0wMS0yNCAyMDozMTozMTE2MTE1MjAyOTEuMDEwOA=="),

    /**
    * Token expiration time
    */
    "exp" => 3600 * 24 * 3,

    /**
     * Configures the issuer
     */
    "iss" => app_env("APP_JWT_ISSUER", "app.example.com"),

    /**
     * Hashing algorithm being used
     *
     * HS256, HS384, HS512, ES256, ES384, ES512
     */
    "alg" => "HS512",

    /**
     * Configures the audience
     */
    "aud" => app_env("APP_JWT_AUD", "app.example.com"),
];
