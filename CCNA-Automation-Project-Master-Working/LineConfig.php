<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
// define variables and set to empty values
$ConTravel;
$ConPass;
$ConMin;
$ConSec;
$clog;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ConTravel = test_input($_POST["ConTravel"]);
  $ConPass = test_input($_POST["ConPass"]);
  $ConMin = test_input($_POST["ConMin"]);
  $ConSec = test_input($_POST["ConSec"]);
  $clog = test_input($_POST["Clog"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Console Config</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Transport: <input type="text" name="ConTravel">
  <br>
      Password: <input type="text" name="ConPass">
  <br>
      Exec-Timeout Minutes: <input type="text" name="ConMin">
  <br>
      Exec-Timeout Seconds: <input type="text" name="ConSec">
  <br>

        Login Settings: <input type="text" name="Clog">
		  <br>
    <input type="submit" name="submitOne" value="Submit">  
  
  
  
 <?php
// define variables and set to empty values
$VtyTransport;
$VtyPassword;
$VtyMin;
$VtySec;
$VtyAclIn;
$VtyAclOut;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $VtyTransport = test_inputs($_POST["VtyTransport"]);
  $VtyPassword = test_inputs($_POST["VtyPassword"]);
    $VtyMin = test_inputs($_POST["VtyMin"]);
	    $VtySec = test_inputs($_POST["VtySec"]);
		    $VtyAclIn = test_inputs($_POST["VtyAclIn"]);
			    $VtyAclOut = test_inputs($_POST["VtyAclOut"]);

}

function test_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
  

		
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  		
<h2>Vty Config</h2>
          Transport: <input type="text" name="VtyTransport">
  <br>
            Password: <input type="text" name="VtyPassword">
			  <br>
            Exec-Timeout Minutes: <input type="text" name="VtyMin">
			  <br>
            Exec-Timeout Seconds: <input type="text" name="VtySec">
						  <br>
            Access-list Out: <input type="text" name="VtyAclOut">

						 <br>
            Access-list In: <input type="text" name="VtyAclIn">
  <br>
    <input type="submit" name="submitTwo" value="Submit">  

<?php
 /* 
* Variables Used: $ConTravel
* Parameters sent: Output
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/transport/output/output
* The expected result of this block is to allow the user to set which travel for console 0 is allowed Ex, ssh, telenet.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/transport/output/output',
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
    "Cisco-IOS-XE-native:output": [
        "'. $ConTravel .'"
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
 /* 
* Variables Used: $ConPass
* Parameters sent: Line console password
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/password/secret
* The expected result of this block is to allow the user to configure a password for the console line.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/password/secret',
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
    "Cisco-IOS-XE-native:secret": "'. $ConPass .'"
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
 /* 
* Variables Used: $ConMin
* Parameters sent: line console timeout in minutes
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/minutes
* The expected result of this block is to allow the user to configure an exec-timeout for the console line (minutes).
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/minutes',
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
    "Cisco-IOS-XE-native:minutes": '. $ConMin .'
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
 /* 
* Variables Used: $ConSec
* Parameters sent: line console timeout in seconds
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/seconds
* The expected result of this block is to allow the user to configure an exec-timeout for the console line(seconds).
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/seconds',
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
    "Cisco-IOS-XE-native:seconds": '. $ConSec .'
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
/* 
* Variables Used: None
* Parameters sent: login local for line console
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/login
* The expected result of this block is to allow the user to configure local login for the console line
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/login',
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
    "Cisco-IOS-XE-native:login": {
        "local": [
            null
        ]
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
// echo $response;
}
?> 
<?php
/* 
* Variables Used: $VtyTransport
* Parameters sent: transport protocol for vty lines
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/transport/input/input
* The expected result of this block is to allow the user to configure which transport they want for the vty lines.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/transport/input/input',
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
    "Cisco-IOS-XE-native:input": [
        "'. $VtyTransport .'"
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
/* 
* Variables Used: $VtyPassword
* Parameters sent: password for vty lines
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/password/secret
* The expected result of this block is to allow the user to configure a password for the vty lines.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/password/secret',
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
    "Cisco-IOS-XE-native:secret": "'. $VtyPassword .'"
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
/* 
* Variables Used: $VtyMin
* Parameters sent: Timeout in minutes for vty lines
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/minutes
* The expected result of this block is to allow the user to configure a exec-timeout for the vty lines(minutes).
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/minutes',
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
    "Cisco-IOS-XE-native:minutes": '. $VtyMin .'
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 

<?php
/* 
* Variables Used: $VtySec
* Parameters sent: Timeout in seconds for vty lines
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/seconds
* The expected result of this block is to allow the user to configure a exec-timeout for the vty lines(seconds).
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/seconds',
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
    "Cisco-IOS-XE-native:seconds": '. $VtySec .'
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?> 
<?php
/* 
* Variables Used: $VtyAclOut
* Parameters sent: outbound acl
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=out/access-list
* The expected result of this block is to allow the user to configure an outbound ACL for the vty lines.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=out/access-list',
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
    "Cisco-IOS-XE-native:access-list": "'. $VtyAclOut .'"
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
}
?>

<?php
/* 
* Variables Used: $VtyAclIn
* Parameters sent: InboundAcl
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=in/access-list
* The expected result of this block is to allow the user to configure an inbound ACL for the vty lines.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=in/access-list',
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
    "Cisco-IOS-XE-native:access-list": "'. $VtyAclIn .'"
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Content-Type: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

}
?>


<br><br>

<h3>Line Console Settings</h3>      
Transport:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a Get request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/transport/output/output
* The expected result of this block is to allow the user to view the transport protocols used for the line console.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/transport/output/output',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Password:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/password/secret
* The expected result of this block is to allow the user to view the password for the line console.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/password/secret',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Exec-Timeout Minutes:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/minutes
* The expected result of this block is to allow the user to view the exec-timeout for the line console(minutes).
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/minutes',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Exec-Timeout Seconds:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/seconds
* The expected result of this block is to allow the user to view the exec-timeout for the line console(seconds).
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/exec-timeout/seconds',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Login Settings:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/login
* The expected result of this block is to allow the user to view the login settings for the line console.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/console=0/login',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<h3>Line Vty Settings</h3>
Transport:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/transport/input/input
* The expected result of this block is to allow the user to view the transport protocols used for the vty lines.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/transport/input/input',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Password:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/password/secret
* The expected result of this block is to allow the user to view the password configured for the vty lines.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/password/secret',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Exec-Timeout Minutes:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/minutes
* The expected result of this block is to allow the user to view exec-timeout configured for the vty lines(minutes).
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/minutes',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Exec-Timeout Seconds:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/seconds
* The expected result of this block is to allow the user to view exec-timeout configured for the vty lines(seconds).
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/exec-timeout/seconds',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 

<br></br>
Access-list Out:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=out/access-list
* The expected result of this block is to allow the user to view the outbound acl configured for the vty lines.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=out/access-list',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 	  
?> 
<br></br>
Access-list In:
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=in/access-list
* The expected result of this block is to allow the user to view the inbound acl configured for the vty lines.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/line/vty=0/access-class/acccess-list=in/access-list',
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
	  
?> 
</body>
</html>