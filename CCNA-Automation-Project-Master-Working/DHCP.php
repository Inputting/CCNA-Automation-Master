<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
$poolName;
$netIp;
$netMask;
$defaultRouter;
$dns;
$lease;
$ipv4Low;
$Ipv4High;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $poolName = test_input($_POST["poolName"]);
    $netIp = test_input($_POST["netIp"]);
	    $netMask = test_input($_POST["netMask"]);
			    $defaultRouter = test_input($_POST["defaultRouter"]);
							    $dns = test_input($_POST["dns"]);
$lease = test_input($_POST["lease"]);
$ipv4Low = test_input($_POST["ipv4Low"]);
$Ipv4High = test_input($_POST["Ipv4High"]);
																																

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>IPv4 DHCP Config</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  DHCP Excluded Address (Low): <input type="text" name="ipv4Low">
  <br>
      DHCP Excluded Address (High): <input type="text" name="Ipv4High">
  <br>
  DHCP Pool Name: <input type="text" name="poolName">
  <br>
    Network IPv4 Address: <input type="text" name="netIp">
  <br>
      Network IPv4 Subnet Mask: <input type="text" name="netMask">
  <br>
        Default-Router: <input type="text" name="defaultRouter">
  <br>
          DNS-Server: <input type="text" name="dns">
  <br>
            Lease: <input type="text" name="lease">
  <br>
    <input type="submit" name="submitOne" value="Submit">  

<?php
/* 
* Variables Used: $poolName
* Parameters sent: pool name
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool
* The expected result of this block is to allow the user to configure the dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool',
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
    "Cisco-IOS-XE-dhcp:pool": [
        {
            "id": "'. $poolName .'"
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
* Variables Used: $poolName, $netIp, $netMask
* Parameters sent: DHCP Pool Name, NetworkIp, Subnet Mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'
* The expected result of this block is to allow the user to configure the dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "id": "'. $poolName .'",
        "network": {
            "primary-network": {
                "number": "'. $netIp .'",
                "mask": "'. $netMask .'"
            }
        }
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
/* 
* Variables Used: $poolName, $defaultRouter
* Parameters sent: DHCP Pool Name, Default router
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'
* The expected result of this block is to allow the user to configure the default router for dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "id": "'. $poolName .'",
        "default-router": {
            "default-router-list": [
                "'. $defaultRouter .'"
            ]
        }
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
/* 
* Variables Used: $poolName, $dns
* Parameters sent: DHCP Pool Name, dns
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'
* The expected result of this block is to allow the user to configure dns for the dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "id": "'. $poolName .'",
        "dns-server": {
            "dns-server-list": [
                "'. $dns .'"
            ]
        }
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
/* 
* Variables Used: $poolName, $lease
* Parameters sent: DHCP Pool Name, lease
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'
* The expected result of this block is to allow the user to configure the lease for the dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "id": "'. $poolName .'",
        "lease": {
            "lease-value": {
                "days": '. $lease .'
            }
        }
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
/* 
* Variables Used: $poolName, $lease
* Parameters sent: DHCP Pool Name, NetworkIp, Subnet Mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'
* The expected result of this block is to allow the user to configure the lease for the dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:pool='. $poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "id": "'. $poolName .'",
        "lease": {
            "'. $lease .'": [
                null
            ]
        }
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
/* 
* Variables Used: $ipv4Lo
* Parameters sent: lowest excluded address
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:excluded-address
* The expected result of this block is to allow the user to configure the excluded address for dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:excluded-address',
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
    "Cisco-IOS-XE-dhcp:excluded-address": {
        "low-address-list": [
            {
                "low-address": "'. $ipv4Low .'"
            }
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
echo $response;
}
?>
<?php
/* 
* Variables Used: $ipv4Lo, $Ipv4High
* Parameters sent: lowest excluded address, Highest excluded address
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:excluded-address
* The expected result of this block is to allow the user to configure the excluded address for dhcp pool on the router.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/dhcp/Cisco-IOS-XE-dhcp:excluded-address',
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
    "Cisco-IOS-XE-dhcp:excluded-address": {
        "low-high-address-list": [
            {
                "low-address": "'. $ipv4Low .'",
                "high-address": "'. $Ipv4High .'"
            }
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
echo $response;
}
?>
<?php
$ipv6poolName;
$addressPrefix;
$ipv6dns;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ipv6poolName = test_inputs($_POST["ipv6poolName"]);
    $addressPrefix = test_inputs($_POST["addressPrefix"]);
	    $ipv6dns = test_inputs($_POST["ipv6dns"]);

																																

}

function test_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>IPv6 DHCP Config</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  DHCP Pool Name: <input type="text" name="ipv6poolName">
  <br>
    Address Prefix: <input type="text" name="addressPrefix">
  <br>
          DNS-Server: <input type="text" name="ipv6dns">
  <br>
    <input type="submit" name="submitTwo" value="Submit">  
	<?php
/* 
* Variables Used: $ipv6poolName
* Parameters sent: IPv6 Pool Name
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/
* The expected result of this block is to allow the user to configure the dhcp pool on the router(ipv6).
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/',
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
    "Cisco-IOS-XE-native:dhcp": {
        "Cisco-IOS-XE-dhcp:pool": [
            {
                "name": "'. $ipv6poolName .'"
            }
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
echo $response;
}
?>
<?php
/* 
* Variables Used: $ipv6poolName, $addressPrefix
* Parameters sent: IPv6 Pool Name, Ipv6 address
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/Cisco-IOS-XE-dhcp:pool='. $ipv6poolName .''
* The expected result of this block is to allow the user to configure the dhcp pool on the router(ipv6).
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/Cisco-IOS-XE-dhcp:pool='. $ipv6poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "name": "'. $ipv6poolName .'",
        "address": {
            "prefix": [
                {
                    "ipv6-address": "'. $addressPrefix .'"
                }
            ]
        }
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
/* 
* Variables Used: $ipv6poolName, $ipv6dns
* Parameters sent: IPv6 Pool Name, IPV6 DNS-Server
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/Cisco-IOS-XE-dhcp:pool='. $ipv6poolName .''
* The expected result of this block is to allow the user to configure the dhcp pool on the router(ipv6).
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6/dhcp/Cisco-IOS-XE-dhcp:pool='. $ipv6poolName .'',
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
    "Cisco-IOS-XE-dhcp:pool": {
        "name": "'. $ipv6poolName .'",
        "dns-server": [
            "'. $ipv6dns .'"
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
echo $response;
}
?>
</body>
</html>