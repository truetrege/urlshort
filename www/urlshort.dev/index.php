<?php

    require_once 'vendor/autoload.php';

    [$controller, $action, $arguments] = routeMatcher();

    $response = $controller::$action($arguments);

    send($response);
    die();