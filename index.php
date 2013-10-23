<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 22.10.13
 * Time: 22:29
 * To change this template use File | Settings | File Templates.
 */

require_once 'Autoloader.php';
Autoloader::register();
$agency = new \Worker\Agency();
$david = new \Worker\Freelancer();
$david->setRate(20);
$david->addHours(2);
$agency->addWorker($david);
$peter = new \Worker\Freelancer();
$peter->setRate(10);
$peter->addHours(1.5);
$agency->addWorker($peter);
// why not to die?!
die($agency->getSalary());