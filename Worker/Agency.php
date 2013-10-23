<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 22.10.13
 * Time: 22:21
 * To change this template use File | Settings | File Templates.
 */
namespace Worker;

class Agency implements WorkableInterface
{
    private $workers;
    public function addWorker(AbstractWorker $worker)
    {
        $this->workers[] = $worker;
    }
    public function getSalary()
    {
        $salary = 0;
        foreach ($this->workers as $worker) {
            $salary += $worker->getSalary();
        }
        return $salary;
    }
}