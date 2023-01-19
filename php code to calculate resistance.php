<?php
function calculateResistance($voltage, $current) {
    return $voltage / $current;
}

$voltage = 120;
$current = 0.5;
$resistance = calculateResistance($voltage, $current);
echo "The resistance is $resistance ohms";
?>
