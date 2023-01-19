<?php
function calculateArea($radius) {
    return pi() * pow($radius, 2);
}

$radius = 5;
$area = calculateArea($radius);
echo "The area of the circle with radius $radius is $area";
?>
