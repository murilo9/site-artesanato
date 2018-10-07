<?php
session_start();
$token = $_POST["token"];
switch ($token){
    case "login":
        echo 'token: login';
        break;
    default:
        echo 'No token';
        break;
}

