<?php
namespace AppBundle\InterfacePrinciple;

use AppBundle\InterfacePrinciple\SleepableInterface;
use AppBundle\InterfacePrinciple\WorkableInterface;
use AppBundle\InterfacePrinciple\ManagableInterface;

class HumanWorker implements WorkableInterface, SleepableInterface, ManagableInterface
{
    public function work()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }

    public function sleep()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }

    public function manage()
    {
        $output = '';
        $output.= $this->work();
        $output.= $this->sleep();
        return $output;
    }
}
