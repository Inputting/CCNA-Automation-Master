<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
// Variables defined for use in routing.
$OspfId;
$OspfIp;
$OspfMask;
$OspArea;
$OspRouterId;


// Variables defined for use in routing.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $OspfId = test_input($_POST["OspfId"]);
    $OspfIp = test_input($_POST["OspfIp"]);
	  $OspfMask = test_input($_POST["OspfMask"]);
	    $OspArea = test_input($_POST["OspArea"]);
			    $OspRouterId = test_input($_POST["OspRouterId"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Router OSPF</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ID: <input type="text" name="OspfId">
  <br>
      Router ID: <input type="text" name="OspRouterId">
  <br>
    Network Address: <input type="text" name="OspfIp">
  <br>
    Network Mask: <input type="text" name="OspfMask">
  <br>
    OSPF Area: <input type="text" name="OspArea">
  <br>


    <input type="submit" name="submitOspf" value="Submit">  
	    <input type="submit" name="DeleteOspf" value="Delete">  

<?php
/* 
* Allows the user to configure OSPF settings on the router.
* Variables Used: $OspfId, $OspRouterId, $OspfIp, $OspfMask, $OspArea
* Parameters sent: OSPF ID, Network IP, Network Mask, Network Area
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf
* The expected result of this block is to change the OSPF settings on the router as per the users input
*/
if(isset($_POST["submitOspf"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf',
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
    "Cisco-IOS-XE-ospf:ospf": [
        {
            "id": '. $OspfId .',
            "router-id": "'. $OspRouterId .'",
            "network": [
                {
                    "ip": "'. $OspfIp .'",
                    "mask": "'. $OspfMask .'",
                    "area": '. $OspArea .'
                }
            ]
        }
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
echo $response;
}
?>

<?php
/* 
* Allows the user to delete OSPF settings on the router.
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a DELETE request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf
* The expected result of this block is to allow the user to delete all OSPF settings on the router
*/
if(isset($_POST["DeleteOspf"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,

  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
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
// Variables defined for IP Routing
$IpRoutePrefix;
$IpRouteMask;
$IpRouteInterface;
$IpRouteIpAddress;




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $IpRoutePrefix = test_inputs($_POST["IpRoutePrefix"]);
    $IpRouteMask = test_inputs($_POST["IpRouteMask"]);
	    $IpRouteInterface = test_inputs($_POST["IpRouteInterface"]);
			    $IpRouteIpAddress = test_inputs($_POST["IpRouteIpAddress"]);


}

function test_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Static Route</h2>
<p>Interface</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Destination Prefix: <input type="text" name="IpRoutePrefix">
  <br>
      Destination Prefix Mask: <input type="text" name="IpRouteMask">
  <br>
    Router Interface: <input type="text" name="IpRouteInterface">
  <br>
      Forwarding Router's Address: <input type="text" name="IpRouteIpAddress">
  <br>
  <input type="submit" name="submitOne" value="Submit">   

 <?php
 /* 
* Allows the user to configure IP Routing on the router.
* Variables Used: $IpRoutePrefix, $IpRouteMask, $IpRouteInterface, $IpRouteIpAddress
* Parameters sent: Route Ip, Route mask, forward address
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/route
* The expected result of this block is set an IP route on the router
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/route',
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
    "Cisco-IOS-XE-native:route": {
        "ip-route-interface-forwarding-list": [
            {
                "prefix": "'. $IpRoutePrefix .'",
                "mask": "'. $IpRouteMask .'",
                "fwd-list": [
                    {
                        "fwd": "'. $IpRouteIpAddress .'"
                    }
                ]
            }
        ]
    }
}
',
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
<h3>Router OSPF</h3>
<?php
 /* 
* Allows the user to view OSPF settings configured on the router.
* Variables Used: None.
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf
* The expected result of this block is to allow the user to view the OSPF settings configured on the device.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf',
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
<h3>Routing</h3>
<?php
 /* 
* Allows the user to view IP Route settings configured on the router.
* Variables Used: None.
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/route
* The expected result of this block is to allow the user to view the IP routing settings configured on the device.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/route',
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