<?php

return [
    /**
     * Le nom du cookie de session
     */
    'name' => app_env('SESSION_NAME', 'Bow'),

    /**
     * La durée de vie du cookie, en secondes. Voir la directive
     */
    'lifetime' => app_env('SESSION_LIFE', 180),

    /**
     * Le chemin dans le domaine où le cookie sera accessible.
     * Utilisez un simple slash ('/') pour tous les chemins du domaine.
     * Voir la directive path: http://php.net/manual/fr/session.configuration.php#ini.session.cookie-path.
     */
    'path' => '/',

    /**
     * Le domaine du cookie, par exemple 'www.exemple.com'.
     * Pour rendre les cookies visibles sur tous les sous-domaines,
     * le domaine doit être préfixé avec un point, tel que '.exemple.com'.
     * Voir la directive domain: http://php.net/manual/fr/session.configuration.php#ini.session.cookie-domain
     */
    'domain' => null,
    
    /**
     * Si true, le cookie ne sera envoyé que sur une connexion sécurisée.
     * Voir la directive secure: http://php.net/manual/fr/session.configuration.php#ini.session.cookie-secure
     */
    'secure' => false,
    
    /**
     * Si true, PHP va tenter d'envoyer l'option httponly lors de la configuration du cookie.
     * Voir la directive httponly: http://php.net/manual/fr/session.configuration.php#ini.session.cookie-httponly
     */
    'httponly' => false,

    /**
     * Chemin des données de session.
     * Si path est spécifié, le chemin du dossier sera modifié.
     *
     * Sur certains systèmes d'exploitation, vous aurez à choisir un chemin vers un dossier
     * capable de gérer un grand nombre de petits fichiers efficacement.
     * Par exemple, sous Linux, reiserfs peut se rendre plus efficace que ext2fs.
     */
    'save_path' => __DIR__.'/../storage/workspace/session',
];
