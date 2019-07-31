<?php

class Functions{
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
public static function make_hash($str)
{
    return sha1(md5($str));
}

/**
 * Verifica se o usuário está logado
 */
public static function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }

    return true;
}
}
