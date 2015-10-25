<?php
namespace AppBundle\InterfacePrinciple;

use AppBundle\InterfacePrinciple\WorkableInterface;
use AppBundle\InterfacePrinciple\ManagableInterface;

class AndroidWorker implements WorkableInterface, ManagableInterface
{
    public function work()
    {
        return  get_class($this) . ' '. __FUNCTION__ . ' ';
    }

    public function manage()
    {
        return $this->work();
    }
}
