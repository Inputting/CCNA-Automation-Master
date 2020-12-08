<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
$descriptionO = "Network Interface";
$ipv4O = "10.10.20.48";
$ipv4SubnetO = "255.255.255.0";
$shutdownO = "true";
$descriptionT = "Network Interface";
$ipv4T = "11.1.1.1";
$ipv4SubnetT = "255.255.255.0";
$shutdownT = "true";
$descriptionH = "Network Interface";
$ipv4H = "2.2.2.2";
$ipv4SubnetH = "255.255.255.0";
$bandwidthO = "1000";
$ipv6T = "8FEF:400:EFDD:301::3/64";
$ipv6SubnetT = ""; 
$ipv6SubnetH = ""; 
$shutdownH = "true";
$bandwidthT = "1000";
$ipv6H = "8FEF:400:EFDD:301::3/64";
$ipv6O = "8FEF:400:EFDD:301::3/64";
$ipv6SubnetO = ""; 
$bandwidthH = "1000";
$ospfip = "2.2.2.0";
$ospfmask = "0.0.0.255";
$ospfarea = "0";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $descriptionO = test_input($_POST["descriptionO"]);
 $ipv4O= test_input($_POST["ipv4O"]);
$ipv4SubnetO = test_input($_POST["ipv4SubnetO"]);
$ipv6O = test_input($_POST["ipv6O"]);
$shutdownO = test_input($_POST["shutdownO"]);
$bandwidthO = test_input($_POST["bandwidthO"]);		  
  $descriptionT = test_input($_POST["descriptionT"]);
    $ipv4T= test_input($_POST["ipv4T"]);
	  $ipv4SubnetT = test_input($_POST["ipv4SubnetT"]);
	    $ipv6T = test_input($_POST["ipv6T"]);
		    $shutdownT = test_input($_POST["shutdownT"]);
			  $bandwidthT = test_input($_POST["bandwidthT"]);
  $descriptionH = test_input($_POST["descriptionH"]);
    $ipv4H = test_input($_POST["ipv4H"]);
	  $ipv4SubnetH = test_input($_POST["ipv4SubnetH"]);
	    $ipv6H = test_input($_POST["ipv6H"]);
		    $shutdownH = test_input($_POST["shutdownH"]);
			  $bandwidthH = test_input($_POST["bandwidthH"]);
			  			  $ospfip = test_input($_POST["ospfip"]);
						  	$ospfmask = test_input($_POST["ospfmask"]);
							 $ospfarea = test_input($_POST["ospfarea"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Interface Config</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<p><h4>GigabitEthernet1</h4></p>
  Description: <input type="text" name="descriptionO">
  <br>
    Ipv4 Address: <input type="text" name="ipv4O">
  <br>
      Ipv4 Subnet: <input type="text" name="ipv4SubnetO">
  <br>
        Ipv6 Address: <input type="text" name="ipv6O">

  <br>
        Online: <input type="text" name="shutdownO">
  <br>
        Bandwidth: <input type="text" name="bandwidthO">




<p><h4>GigabitEthernet2</h4></p>
  Description: <input type="text" name="descriptionT">
  <br>
    Ipv4 Address: <input type="text" name="ipv4T">
  <br>
      Ipv4 Subnet: <input type="text" name="ipv4SubnetT">
  <br>
        Ipv6 Address: <input type="text" name="ipv6T">

  <br>
        Online: <input type="text" name="shutdownT">
  <br>
        Bandwidth: <input type="text" name="bandwidthT">





<p><h4>GigabitEthernet3</h4></p>
  Description: <input type="text" name="descriptionH">
  <br>
    Ipv4 Address: <input type="text" name="ipv4H">
  <br>
      Ipv4 Subnet: <input type="text" name="ipv4SubnetH">
  <br>
        Ipv6 Address: <input type="text" name="ipv6H">
  <br>

        Online: <input type="text" name="shutdownH">
  <br>
        Bandwidth: <input type="text" name="bandwidthH">
  <br>
  <p><h4>Router OSPF</h4></p>
        OSPF Network: <input type="text" name="ospfip">
		  <br>
		          OSPF Mask: <input type="text" name="ospfmask">
		  <br>

        OSPF Area: <input type="text" name="ospfarea">
		  <br>



    <input type="submit" name="submit" value="Submit">  
  </form>


<?php
/* 
* Variables Used: $descriptionO, $shutdownO, $ipv4O, $ipv4SubnetO, $descriptionT , $shutdownT, $ipv4T, $ipv4Subnet, $descriptionH, $shutdownH, $ipv4H, $ipv4SubnetH
* Parameters sent: Description, Enabled, IP, Netmask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/
* The expected result of this block is to allow the user to configure the IP address, subnet masks, descriptions, and shutdown or enable the port.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
CURLOPT_POSTFIELDS =>'{
    "ietf-interfaces:interfaces": {
        "interface": [
            {
                "name": "GigabitEthernet1",
                "description": "'. $descriptionO .'",
                "type": "iana-if-type:ethernetCsmacd",
                "enabled": '. $shutdownO .',
                "ietf-ip:ipv4": {
                    "address": [
                        {
                            "ip": "'. $ipv4O .'",
                            "netmask": "'. $ipv4SubnetO .'"
                        }
                    ]
                },
                "ietf-ip:ipv6": {}
            },
            {
                "name": "GigabitEthernet2",
                "description": "'. $descriptionT .'",
                "type": "iana-if-type:ethernetCsmacd",
                "enabled": '. $shutdownT .',
                "ietf-ip:ipv4": {
                    "address": [
                        {
                            "ip": "'. $ipv4T .'",
                            "netmask": "'. $ipv4SubnetT .'"
                        }
                    ]
                },
                "ietf-ip:ipv6": {}
            },
            {
                "name": "GigabitEthernet3",
                "description": "'. $descriptionH .'",
                "type": "iana-if-type:ethernetCsmacd",
                "enabled": '. $shutdownH .',
                "ietf-ip:ipv4": {
                    "address": [
                        {
                            "ip": "'. $ipv4H .'",
                            "netmask": "'. $ipv4SubnetH .'"
                        }
                    ]
                },
                "ietf-ip:ipv6": {}
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
?>

<?php
/* 
* Variables Used: $ospfip, $ospfmask, $ospfarea
* Parameters sent:Ip, mask, area
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router
* The expected result of this block is to allow the user to configure the OSPF settings on the router.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:router": {
        "Cisco-IOS-XE-ospf:ospf": [
            {
                "id": 1,
                "network": [
                    {
                        "ip": "'. $ospfip .'",
                        "mask": "'. $ospfmask.'",
                        "area": '. $ospfarea .'
                    }
                ]
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
?>


<?php
/* 
* Variables Used: $bandwidthO
* Parameters sent: Kilobits
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/bandwidth/kilobits
* The expected result of this block is to allow the user to configure the bandwidth/kilobits for GigabitEthernet1.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/bandwidth/kilobits',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:kilobits": '. $bandwidthO .'
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
?>



<?php
/* 
* Variables Used: $bandwidthT
* Parameters sent: Kilobits
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/bandwidth/kilobits
* The expected result of this block is to allow the user to configure the bandwidth/kilobits for GigabitEthernet2.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/bandwidth/kilobits',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:kilobits": '. $bandwidthT .'
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
?>



<?php
/* 
* Variables Used: $bandwidthH
* Parameters sent: Kilobits
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/bandwidth/kilobits
* The expected result of this block is to allow the user to configure the bandwidth/kilobits for GigabitEthernet3.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/bandwidth/kilobits',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:kilobits": '. $bandwidthH .'
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
?>
<?php
/* 
* Variables Used: None
* Parameters sent: Unicast-Routing
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6
* The expected result of this block is to enable IPV6 Routing.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ipv6',
  CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:ipv6": {
        "unicast-routing": [
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
echo $response;
?>

<?php
/* 
* Variables Used: $ipv6O
* Parameters sent: ipv6 prefix
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/ipv6/address/prefix-list
* The expected result of this block is to allow the user to configure Ipv6 address for GigabitEthernet1.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/ipv6/address/prefix-list',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:prefix-list": [
        {
            "prefix": "'. $ipv6O .'"
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
?>

<?php
/* 
* Variables Used: $ipv6T
* Parameters sent: ipv6 prefix
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/ipv6/address/prefix-list
* The expected result of this block is to allow the user to configure Ipv6 address for GigabitEthernet2.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/ipv6/address/prefix-list',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:prefix-list": [
        {
            "prefix": "'. $ipv6T .'"
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
?>
<?php
/* 
* Variables Used: $ipv6H
* Parameters sent: ipv6 prefix
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/ipv6/address/prefix-list
* The expected result of this block is to allow the user to configure Ipv6 address for GigabitEthernet3.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/ipv6/address/prefix-list',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:prefix-list": [
        {
            "prefix": "'. $ipv6H .'"
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
?>


<h3>GigabitEthernet 1</h3>
 Description
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/description
* The expected result of this block is to allow the user to View the description for GigabitEthernet1
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/description',
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
 IP Address: 
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/ietf-ip:ipv4/address
* The expected result of this block is to allow the user to View the IP for GigabitEthernet1
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/ietf-ip:ipv4/address',
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
 IPv6 Address: 
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/ietf-ip:ipv6
* The expected result of this block is to allow the user to View the IPV6 for GigabitEthernet1
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/ietf-ip:ipv6',
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

 Port Online: 
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/enabled
* The expected result of this block is to allow the user to View the port status for GigabitEthernet1
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet1/enabled',
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
 Bandwidth
 <?php
   /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/bandwidth/kilobits'
* The expected result of this block is to allow the user to View the bandwith for GigabitEthernet1
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=1/bandwidth/kilobits',
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
 
 
 
 
 
 
 
 
 
 
<h3>GigabitEthernet 2</h3>
 Description
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/description
* The expected result of this block is to allow the user to View the description for GigabitEthernet2
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/description',
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
 IP Address: 
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/ietf-ip:ipv4/address
* The expected result of this block is to allow the user to View the IP address for GigabitEthernet2
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/ietf-ip:ipv4/address',
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
 IPv6 Address: 
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/ietf-ip:ipv6
* The expected result of this block is to allow the user to View the IPv6 address for GigabitEthernet2
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/ietf-ip:ipv6',
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
  Port Online: 
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/enabled
* The expected result of this block is to allow the user to View the port status for GigabitEthernet2
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet2/enabled',
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
 Bandwidth
 <?php
 /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/bandwidth/kilobits
* The expected result of this block is to allow the user to View the bandwith for GigabitEthernet2
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=2/bandwidth/kilobits',
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<h3>GigabitEthernet 3</h3>
 Description
  <?php
   /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/description
* The expected result of this block is to allow the user to View description for GigabitEthernet3
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/description',
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
 IP Address: 
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/ietf-ip:ipv4/address
* The expected result of this block is to allow the user to View the ip address for GigabitEthernet3
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/ietf-ip:ipv4/address',
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
 IPv6 Address: 
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/ietf-ip:ipv6
* The expected result of this block is to allow the user to View the ipv6 address for GigabitEthernet3
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/ietf-ip:ipv6',
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
  Port Online: 
  <?php
    /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/enabled
* The expected result of this block is to allow the user to View the port status for GigabitEthernet3
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48:443/restconf/data/ietf-interfaces:interfaces/interface=GigabitEthernet3/enabled',
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
  Bandwidth
 <?php
     /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/bandwidth/kilobits
* The expected result of this block is to allow the user to View the bandwith for GigabitEthernet3
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/interface/GigabitEthernet=3/bandwidth/kilobits',
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
 <h3>OSPF</h3>
 Description
  <?php
       /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/router/Cisco-IOS-XE-ospf:ospf
* The expected result of this block is to allow the user to View the OSPF Settings
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
	'Content-type: application/json',
	    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU='
  ),
));
$response = curl_exec($curl);
curl_close($curl);
 echo $response;
 ?>
  <br></br>

</body>
</html>