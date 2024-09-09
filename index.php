<?php
require_once('./bdd.php');
require_once('./src/homepage/controller.php');
require_once('./src/login/controller.php');
require_once('./src/register/controller.php');

function route_request()
{
    $uri = $_SERVER['REQUEST_URI']; {
        switch ($uri) {
            case '/':
                controller_homepage();
                break;
            case '/login':
                controller_login();
                break;
            case '/register':
                controller_register();
                break;
        }
    }
}

route_request();
