<?php

if (! function_exists('gen_slix')) {
    /**
     * Génère un code aléatoire.
     * Peut être utiliser pour masquer le nom de champs de formulaire.
     *
     * @param int $len
     * @return string
     */
    function gen_slix($len = 4)
    {
        return substr(str_shuffle(uniqid()), 0, $len);
    }
}
