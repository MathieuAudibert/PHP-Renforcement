<?php
require_once('./src/homepage/controller.php');
require_once('./src/register/controller.php');



function route_request()
{
    $uri = $_SERVER['REQUEST_URI']; {
        switch ($uri) {
            case '/':
                controller_homepage();
                break;
            case '/register':
                controller_login();
                break;
            default:
        }
    }
}

route_request();
