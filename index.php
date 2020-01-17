<?php

include_once('config.php');
session_start();

$info = explode('/', $_GET['q']);

$params = array();

foreach ($info as $v)
{
    if ($v != '')
        $params[] = $v;
}

$action = 'action_';
$action .= (isset($params[1])) ? $params[1] : 'index';

switch ($params[0])
{
    case 'main':
        $controller = new C_Index();
        break;
    case 'auth':
        $controller = new C_Auth();
        break;
    default:
        $controller = new C_Index();
        break;
}

$controller->Request($action, $params);

?>