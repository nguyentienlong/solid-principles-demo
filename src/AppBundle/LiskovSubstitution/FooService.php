<?php

namespace AppBundle\LiskovSubstitution;

class FooService
{
    protected $obj;

    public function __construct(BaseClassA $obj)
    {
        $this->obj = $obj;
    }

    public function doSomeThing()
    {
        return $this->obj->printAll();
    }
}
