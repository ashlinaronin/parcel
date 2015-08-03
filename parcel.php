<?php

class Parcel
{
    private $length;
    private $width;
    private $height;
    private $weight;

    function __construct($parcel_length, $parcel_width, $parcel_height, $parcel_weight)
    {
        $this->length = (float) $parcel_length;
        $this->width = (float) $parcel_width;
        $this->height = (float) $parcel_height;
        $this->weight = (float) $parcel_weight;
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

    function costToShip()
    {
        $dim_weight = $this->volume() * $this->getWeight();
        return $dim_weight * .5;
    }


}

$isParcel = false;
$error = "";

if ($_GET['length'] == 0) {
    $error = "Please add a value for length.";
} elseif ($_GET['width'] == 0) {
    $error = "Please add a value for width.";
} elseif ($_GET['height'] == 0) {
    $error = "Please add a value for height";
} elseif ($_GET['weight'] == 0) {
    $error = "Please add a value for weight.";
} else {
    $your_parcel = new Parcel($_GET['length'], $_GET['width'],
        $_GET['height'], $_GET['weight']);
    $isParcel = true;
}


?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <title>Your Parcel</title>
    </head>
    <body>
        <div class="container">
            <h1>Your parcel:</h1>
            <ul>
                <?php
                    if (!$isParcel) {
                        echo $error;
                    } else {
                        echo "<li>Length: " . $your_parcel->getLength() . "</li>";
                        echo "<li>Width: " . $your_parcel->getWidth() . "</li>";
                        echo "<li>Height: " . $your_parcel->getHeight() . "</li>";
                        echo "<li>Weight: " . $your_parcel->getWeight() . "</li>";
                        echo "<li><strong>Volume: " . $your_parcel->volume() .
                            "</strong></li>";
                        echo "<li>Total Cost: $" . $your_parcel->costToShip() . "</li>";
                    }
                ?>
            </ul>
        </div>
    </body>
</html>
