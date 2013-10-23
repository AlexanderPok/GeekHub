<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 22.10.13
 * Time: 22:26
 * To change this template use File | Settings | File Templates.
 */
namespace Worker;

class Freelancer extends AbstractWorker
{
    private $hours = 0;
    private $rate = 0;
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
    public function addHours($hours)
    {
        $this->hours += $hours;
    }
    public function getSalary()
    {
        return $this->rate * $this->hours;
    }
}