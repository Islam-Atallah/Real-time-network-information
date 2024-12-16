<?php
$i = 0;

$obj1 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.2");
$obj2 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.3");
$obj3 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.4.22.1.4");

// Create a string to hold the concatenated values
$result = "";
$result .= "Key\t\t    MAC\t\t\t    IP\t\t\t    Type\n";
foreach ($obj2 as $k => $val) {
    // Concatenate the values
    if ($i < 5) {
        $result .= "    $k\t\t    $obj1[$i]\t\t\t    $obj2[$i]\t\t    $obj3[$i] \n";
    } else {
        $result .= "    $k\t\t    $obj1[$i]\t    $obj2[$i]\t\t    $obj3[$i] \n";
    }

    $i++;
}

// Output the result as plain text
header('Content-Type: text/plain');
echo $result;
?>
