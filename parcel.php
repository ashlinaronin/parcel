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

setlocale(LC_MONETARY, 'en_US'); // Adds locaation info for monetry value

$isParcel = false;
$error = "";

if (empty($_GET['length']) || is_nan($_GET['length'])) {
    $error = "length";
} elseif (empty($_GET['width']) || is_nan($_GET['width'])) {
    $error = "width";
} elseif (empty($_GET['height']) || is_nan($_GET['height'])) {
    $error = "height";
} elseif (empty($_GET['weight']) || is_nan($_GET['weight'])) {
    $error = "weight";
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
        <style media="screen">
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Your parcel:</h1>
                    <ul>
                        <?php
                            if (!$isParcel) {
                                echo "<h3>Please add a numerical value for " . $error . ".</h3>";
                            } else {
                                $dim_price = money_format('%(#10.2n', $your_parcel->costToShip());
                                echo "<li>Length: " . $your_parcel->getLength() . "</li>\n";
                                echo "<li>Width: " . $your_parcel->getWidth() . "</li>\n";
                                echo "<li>Height: " . $your_parcel->getHeight() . "</li>\n";
                                echo "<li>Weight: " . $your_parcel->getWeight() . "</li>\n";
                                echo "<li><strong>Volume: " . $your_parcel->volume() .
                                    "</strong></li>\n";
                                echo "<li>Total Cost:" . $dim_price . "</li>\n";
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <?php
                        if (!$isParcel) {
                        echo "<img class='img-responsive hidden' src='images/box.jpg'>";
                    } else {
                        echo "<img class='img-responsive' src='images/box.jpg'>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
