<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 27.10.13
 * Time: 19:29
 * To change this template use File | Settings | File Templates.
 */
namespace Workstation\Controller;
use Core\Controller;
use \Workstation\Entity\Agency;
use \Workstation\Entity\Freelancer;
class IndexController extends Controller
{
    public function indexAction()
    {
        $agency = new Agency();
        $david = new Freelancer();
        $david->setRate(20);
        $david->addHours(2);
        $agency->addWorker($david);
        $peter = new Freelancer();
        $peter->setRate(10);
        $peter->addHours(1.5);
        $agency->addWorker($peter);
        $this->renderView('Index/index.html.twig', array('totalSalary' => $agency->getSalary()));
    }
}