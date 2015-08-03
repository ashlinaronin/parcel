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

    function volume()
    {
        return $this->length * $this->width * $this->height;
    }


}

$your_parcel = new Parcel($_GET['length'], $_GET['width'],
    $_GET['height'], $_GET['weight']);



?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <title>Your Parcel</title>
    </head>
    <body>
        <h1>Your parcel:</h1>
        <ul>
            <?php
                echo "<li>Length: " . $your_parcel->getLength() . "</li>";
                echo "<li>Width: " . $your_parcel->getWidth() . "</li>";
                echo "<li>Height: " . $your_parcel->getHeight() . "</li>";
                echo "<li>Weight: " . $your_parcel->getWeight() . "</li>";
                echo "<li><strong>Volume: " . $your_parcel->volume() .
                    "</strong></li>";
            ?>
        </ul>

    </body>
</html>
