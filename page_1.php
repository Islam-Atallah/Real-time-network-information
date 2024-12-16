

<?php
$ip = "127.0.0.1:161";
$i =0;
$description= snmp2_get($ip,"public",".1.3.6.1.2.1.1.1.0");
$id= snmp2_get($ip,"public",".1.3.6.1.2.1.1.2.0");
$time= snmp2_get($ip,"public",".1.3.6.1.2.1.1.3.0");
$contact= snmp2_get($ip,"public",".1.3.6.1.2.1.1.4.0");
$name= snmp2_get($ip,"public",".1.3.6.1.2.1.1.5.0");
$location= snmp2_get($ip,"public",".1.3.6.1.2.1.1.6.0");
//$services= snmp2_get($ip,"public",".1.3.6.1.2.1.1.7.0");
// line 92: <tr><th>System services</th><td>$services</td></tr> 




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'data' parameter is set
    if (isset($_POST['data'])) {
        
         $Contact = $_POST['data'];
         snmp2_set($ip,"public",".1.3.6.1.2.1.1.4.0",'s',''.$Contact);
        
    } 
	if (isset($_POST['data2'])) {
        
		  $Name=$_POST['data2'];
		  snmp2_set($ip,"public",".1.3.6.1.2.1.1.5.0",'s',''.$Name);
		 
       
    } 
	if (isset($_POST['data3'])) {
        
		  $Location=$_POST['data3'];
		  snmp2_set($ip,"public",".1.3.6.1.2.1.1.6.0",'s',''.$Location);
		 
       
    } 
	
	
	
} 


$result = "";
$result .= "description: $description    \n";//  MAC\t\t\t    IP\t\t\t    Type\n";
$result .= "System object ID: $id    \n";
$result .= "System Up time: $time    \n";
$result .= "System contact: $contact    \n";
$result .= "System name: $name    \n";
$result .= "System location: $location    \n";

header('Content-Type: text/plain');
echo $result;




?>



