<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 09/01/2018
 * Time: 17:20
 */
session_start();

session_destroy();

header('location:login.html');
?>