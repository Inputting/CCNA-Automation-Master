<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
$interface;
$cdpStatus;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $interface = test_input($_POST["interface"]);
    $cdpStatus = test_input($_POST["cdpStatus"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>CDP</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Interface Number: <input type="text" name="interface">
  <br>
    CDP Status (True/False): <input type="text" name="cdpStatus">
  <br>
    <input type="submit" name="submitOne" value="Submit">  
<?php
 /* 
* Variables Used: $cdpStatus, interface
* Parameters sent: Interface Number, Cdp status
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet='. $interface .'/Cisco-IOS-XE-cdp:cdp
* The expected result of this block is to allow the user to enable CDP for the line specified.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet='. $interface .'/Cisco-IOS-XE-cdp:cdp',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PATCH',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-cdp:cdp": {
        "enable": '. $cdpStatus .'
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}
?>
<?php
$interfaceLLDP;
$LLDPReceiveOrTransit;
$LLDPStatus;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $interface = test_inputs($_POST["interface"]);
    $cdpStatus = test_inputs($_POST["cdpStatus"]);
	    $LLDPReceiveOrTransit = test_inputs($_POST["LLDPReceiveOrTransit"]);

}

function test_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>CDP</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Interface Number: <input type="text" name="interface">
  <br>
    LLDP Status (True/False): <input type="text" name="cdpStatus">
  <br>
      LLDP Status (Receive/Transmit): <input type="text" name="LLDPReceiveOrTransit">
  <br>
    <input type="submit" name="submitTwo" value="Submit">  
<?php
/* 
* Variables Used: $cdpStatus, $interface, $LLDPReceiveOrTransit
* Parameters sent: Interface Number, Cdp status, lldp transmit
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/'. $interface .'/Cisco-IOS-XE-lldp:lldp
* The expected result of this block is to allow the user to enable LLDP for the line specified.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/'. $interface .'/Cisco-IOS-XE-lldp:lldp',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PATCH',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-lldp:lldp": {
        "'. $LLDPReceiveOrTransit .'": '. $cdpStatus .'
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}
?>
<h3>CDP Settings</h3>
 GigabitEthernet 1:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-cdp:cdp
* The expected result of this block is to allow the user to view the CDP settings for GigabitEthernet1.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-cdp:cdp',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
 <br></br>
 GigabitEthernet 2:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-cdp:cdp
* The expected result of this block is to allow the user to view the CDP settings for GigabitEthernet2.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-cdp:cdp',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
 <br></br>
 GigabitEthernet 3:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-cdp:cdp
* The expected result of this block is to allow the user to view the CDP settings for GigabitEthernet3.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-cdp:cdp',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<h3>LLDP Settings</h3>
 GigabitEthernet 1:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-lldp:lldp/receive
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet1(receive).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-lldp:lldp/receive',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<br></br>
 GigabitEthernet 1:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-lldp:lldp/receive
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet1(transmit).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/Cisco-IOS-XE-lldp:lldp/transmit',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<br></br>
 GigabitEthernet 2:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-lldp:lldp/receive
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet2(receive).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-lldp:lldp/receive',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<br></br>
 GigabitEthernet 2:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-lldp:lldp/transmit
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet2(transmit).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/Cisco-IOS-XE-lldp:lldp/transmit',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<br></br>
 GigabitEthernet 3:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-lldp:lldp/receive
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet3(receive).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-lldp:lldp/receive',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<br></br>
 GigabitEthernet 3:
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-lldp:lldp/transmit
* The expected result of this block is to allow the user to view the LLDP settings for GigabitEthernet3(transmit).
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/Cisco-IOS-XE-lldp:lldp/transmit',
  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
</body>
</html>