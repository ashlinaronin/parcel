<?php

class Parcel
{
    private $length;
    private $width;
    private $height;
    private $weight;

    function __construct($parcel_length, $parcel_width, $parcel_height, $parcel_weight)
    {
        $this->length = $parcel_length;
        $this->width = $parcel_width;
        $this->height = $parcel_height;
        $this->weight = $parcel_weight;
    }

    function setLength($new_length)
    {
        $this->length = (float) $new_length;
    }

    function getLength()
    {
        return $this->length;
    }

    function setWidth($new_width)
    {
        $this->width = (float) $new_width;
    }

    function getWidth()
    {
        return $this->width;
    }

    function setHeight($new_height)
    {
        $this->height = (float) $new_height;
    }

    function getHeight()
    {
        return $this->height;
    }

    function setWeight($new_weight)
    {
        $this->weight = (float) $new_weight;
    }

    function getWeight()
    {
        return $this->weight;
    }
}



?>
