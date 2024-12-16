<?php
// Create an array to store the names of the SNMP objects

$snmpObjectNames = array(
    1 => "snmpInPkts",
    2 => "snmpOutPkts",
    3 => "snmpInBadVersions",
    4 => "snmpInBadCommunityNames",
    5 => "snmpInBadCommunityUses",
    6 => "snmpInASNParseErrs",
    8 => "snmpEnableAuthenTraps",
    9 => "snmpSilentDrops",
    10 => "snmpProxyDrops",
    11 => "snmpNoSuchNames",
    12 => "snmpBadValues",
    13 => "snmpReadOnlys",
    14 => "snmpGenErrs",
    15 => "snmpTotalReqVars",
    16 => "snmpTotalSetVars",
    17 => "snmpGetRequests",
    18 => "snmpGetNexts",
    19 => "snmpSetRequests",
    20 => "snmpGetResponses",
    21 => "snmpTraps",
    22 => "snmpInTooBigs",
    24 => "snmpNoSuchNames",
    25 => "snmpBadValues",
    26 => "snmpGenErrs",
    27 => "snmpInPkts",
    28 => "snmpOutPkts",
    29 => "snmpInBadVersions",
    30 => "snmpInBadCommunityNames",
    // Add more names here based on the link provided
);

// Function to get SNMP values for the SNMP group and format them
function getSNMPValues($host, $community, $oid)
{
    $values = snmp2_walk($host, $community, $oid);
    foreach ($values as &$value) {
        // Remove data type information
        $value = preg_replace('/[^0-9]/', '', $value);
    }
    return $values;
}

// Prepare the data
$data = array();
foreach ($snmpObjectNames as $id => $name) {
    if ($id == 7 || $id == 23) {
        continue; // Skip IDs 7 and 23
    }
    $oid = ".1.3.6.1.2.1.11.$id";
    $values = getSNMPValues("127.0.0.1", "public", $oid);
    $data[] = array(
        'id' => $id,
        'name' => $name,
        'values' => $values
    );
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>