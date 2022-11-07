<?php
session_start();

if(!$_SESSION['NOM'])
{
    header('Location: login.php');
}
?>