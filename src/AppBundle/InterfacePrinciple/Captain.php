<?php

namespace AppBundle\InterfacePrinciple;

class Captain
{
    public function manage(ManagableInterface $worker)
    {
        $log = '';
        $log .= $worker->manage();

        return $log;
    }
}
