<?php

namespace AppBundle\LiskovSubstitution;

class ExtendBaseClassA extends BaseClassA
{
    public function __construct()
    {
        parent::__construct();
    }

    public function printAll()
    {
        return json_encode($this->dumpArr);
    }
}
