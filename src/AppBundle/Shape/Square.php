<?php
namespace AppBundle\Shape;

class Square implements Shape
{
    public $width;
    public $height;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->with = $width;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}
