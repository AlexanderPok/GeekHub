<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 22.10.13
 * Time: 22:29
 * To change this template use File | Settings | File Templates.
 */

require_once '../vendor/autoload.php';
require_once '../src/Core/App.php';
$app = new \Core\App();
$app->handleRequest();