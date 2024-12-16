<?php

// Perform SNMP walk to retrieve TCP connection information
$obj1 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.1"); // Local address
$obj2 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.2"); // Local port
$obj3 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.3"); // Remote address
$obj4 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.4"); // Remote port
$obj5 = snmpwalk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.5"); // Connection state

// Display TCP connection information in a table
echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCP Table </title>
    <link rel="stylesheet" href="s.css">
</head>

<body>
    <div class="container">
        <div>
            <h1 class="message" style="text-align: center;">TCP Table</h1>
        </div>
    </div>
</body>
</html>
HTML;

// Display TCP connection information in a table
echo "<table border='1' style='width: 50%' class='center'>";
echo "<tr> 
<th> Local Address </th> 
<th> Local Port </th> 
<th> Remote Address </th>
 <th> Remote Port </th> 
<th> State </th> </tr>";

// Loop through the retrieved data and display it in the table
foreach ($obj1 as $i => $val) {
    echo "<tr>";
    echo "<td>" . $obj1[$i] . "</td>";
    echo "<td>" . $obj2[$i] . "</td>";
    echo "<td>" . $obj3[$i] . "</td>";
    echo "<td>" . $obj4[$i] . "</td>";
    echo "<td>" . $obj5[$i] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
