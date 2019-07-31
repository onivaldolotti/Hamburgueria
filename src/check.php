<?php
require_once 'autoload.php';

if (!Functions::isLoggedIn())
{
    header('Location: form-login.php');
}
