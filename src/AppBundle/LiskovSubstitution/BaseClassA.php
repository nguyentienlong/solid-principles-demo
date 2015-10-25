<?php

namespace AppBundle\LiskovSubstitution;

class BaseClassA
{
    protected $dumpArr;

    public function __construct()
    {
        $this->dumpArr = [1,2,3,4,5,6,7,8,9];
    }

    public function printAll()
    {
        return json_encode($this->dumpArr);
    }
}
