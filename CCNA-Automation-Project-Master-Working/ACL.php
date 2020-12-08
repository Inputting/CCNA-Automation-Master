<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
// define variables and set to empty values

$newaclname;
$newaclaction;
$newaclsequence;
$newaclprotocol;
$newaclhost;
$newacldestinationip;
$newacldestinationmask;
$newacldestinationipany;
$newaclhostany;
$newacldestinationipj;
$newaclsourcemask;
$newaclsourceip;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newaclname = test_input($_POST["newaclname"]);
    $newaclaction = test_input($_POST["newaclaction"]);
	    $newaclsequence = test_input($_POST["newaclsequence"]);
	  $newaclprotocol = test_input($_POST["newaclprotocol"]);
	    $newaclhost = test_input($_POST["newaclhost"]);
		  $newacldestinationip = test_input($_POST["newacldestinationip"]);
		  		  $newacldestinationmask = test_input($_POST["newacldestinationmask"]);
				  		  $newacldestinationipj = test_input($_POST["newacldestinationipj"]);
		  		  $newaclsourceip= test_input($_POST["newaclsourceip"]);
			  		  $newaclsourcemask = test_input($_POST["newaclsourcemask"]);			  
				  		  $newacldestinationipany = test_input($_POST["newacldestinationipany"]);
		  		  $newaclhostany = test_input($_POST["newaclhostany"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Create Extended Access List Named</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ACL Name: <input type="text" name="newaclname">
  <br>
    Sequence Number: <input type="text" name="newaclsequence">
  <br>
    Permit / Deny: <input type="text" name="newaclaction">
  <br>
      Protocol: <input type="text" name="newaclprotocol">
  <br>
    Source Host Address: <input type="text" name="newaclhost">
  <br>
      Source Address: <input type="text" name="newaclsourceip">
  <br>
      Source Mask (Wildcard): <input type="text" name="newaclsourcemask">
  <br>
     Source Address (Any): <input type="text" name="newaclhostany">
  <br>
          Destination Source Address: <input type="text" name="newacldestinationipj">
  <br>
        Destination Host Address: <input type="text" name="newacldestinationip">
  <br>
          Destination Host Address (Any): <input type="text" name="newacldestinationipany">
  <br>
    Destination Mask (Wildcard): <input type="text" name="newacldestinationmask">
  <br>
  

    <input type="submit" name="submitOne" value="Submit">  
	<input type="submit" name="submitTwo" value="Delete">  
	
	
<?php
// define variables and set to empty values

$newaclnamestandard;
$newaclactionstandard;
$newaclsequencestandard;
$newaclhoststandard;
$newaclhostanystandard;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newaclnamestandard = test_inputv($_POST["newaclnamestandard"]);
    $newaclactionstandard = test_inputv($_POST["newaclactionstandard"]);
	    $newaclsequencestandard = test_inputv($_POST["newaclsequencestandard"]);
	    $newaclhoststandard = test_inputv($_POST["newaclhoststandard"]);
			    $newaclhostanystandard = test_inputv($_POST["newaclhostanystandard"]);

}

function test_inputv($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Create Standard Access List Named</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ACL Name: <input type="text" name="newaclnamestandard">
  <br>
    Sequence Number: <input type="text" name="newaclsequencestandard">
  <br>
    Permit / Deny: <input type="text" name="newaclactionstandard">
  <br>

    Address: <input type="text" name="newaclhoststandard">
  <br>
    Address (Any): <input type="text" name="newaclhostanystandard">
  <br>

    <input type="submit" name="submitFour" value="Submit">  	
		<input type="submit" name="submitFive" value="Delete">  
	

<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhost, $newaclprotocol, $newacldestinationipj, $newacldestinationmask
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Host address, Destination Ip, Destinaton mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to source
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/',
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
    "Cisco-IOS-XE-acl:extended": {
        "name": "'. $newaclname .'",
        "access-list-seq-rule": [
            {
                "sequence": "'. $newaclsequence .'",
                "ace-rule": {
                    "action": "'. $newaclaction .'",
                    "protocol": "'. $newaclprotocol .'",
                    "host": "'. $newaclhost .'",
                    "dest-ipv4-address": "'. $newacldestinationipj .'",
                    "dest-mask": "'. $newacldestinationmask .'"
                }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhost, $newaclprotocol, $newacldestinationipj, $newacldestinationmask
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Host address, Destination Ip, Destinaton mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to source
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/',
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
    "Cisco-IOS-XE-acl:extended": {
        "name": "'. $newaclname .'",
        "access-list-seq-rule": [
            {
                "sequence": "'. $newaclsequence .'",
                "ace-rule": {
                    "action": "'. $newaclaction .'",
                    "protocol": "'. $newaclprotocol .'",
                    "host": "'. $newaclhost .'",
                    "dest-ipv4-address": "'. $newacldestinationipj .'",
                    "dest-mask": "'. $newacldestinationmask .'"
                }
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
// echo $response;
}
?>



<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Host address, Destination
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Any
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Host address, Destination
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Any
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>

<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipj, $newacldestinationmask
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Any, Destination ip, destination mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Source
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dest-ipv4-address": "'. $newacldestinationipj .'",
                        "dest-mask": "'. $newacldestinationmask .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipj, $newacldestinationmask
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Any, Destination ip, destination mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Source
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dest-ipv4-address": "'. $newacldestinationipj .'",
                        "dest-mask": "'. $newacldestinationmask .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipj
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Any, Destination ip
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Network
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dst-host": "'. $newacldestinationipj .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclhostany, $newaclprotocol, $newacldestinationipj
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, Any, Destination ip
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to Network
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "'. $newaclhostany .'": [
                            null
                        ],
                        "dst-host": "'. $newacldestinationipj .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, host, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to host
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "host": "'. $newaclhost .'",
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, host, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to host
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "host": "'. $newaclhost .'",
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, any, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to host
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "any": [
                            null
                        ],
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, any, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Any to host
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "any": [
                            null
                        ],
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, host, destination any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to any
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "host": "'. $newaclhost .'",
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclhost, newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, host, destination any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Host to any
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "host": "'. $newaclhost .'",
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationipj, $newacldestinationmask 
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination ip address, destination mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to source
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dest-ipv4-address": "'. $newacldestinationipj .'",
                        "dest-mask": "'. $newacldestinationmask .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationipj, $newacldestinationmask 
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination ip address, destination mask
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to source
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dest-ipv4-address": "'. $newacldestinationipj .'",
                        "dest-mask": "'. $newacldestinationmask .'"
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to any
* Character name.
*/
if(isset($_POST["submitOne"])) {


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>

<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationipany
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to any
* Numeric name.
*/
if(isset($_POST["submitOne"])) {


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dst-'. $newacldestinationipany .'": [
                            null
                        ]
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to network
* Character name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": "'. $newaclname .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>

<?php
/* 
* Variables Used: $newaclname, $newaclsequence, $newaclaction, $newaclprotocol, $newaclsourceip, $newaclsourcemask, $newacldestinationip
* Parameters sent: ACL name, Acl Sequence, ACL, action, ACL, protocol, ip address, mask, destination host
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to configure an extended acl.
* Source to network
* Numeric name.
*/
if(isset($_POST["submitOne"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
    "Cisco-IOS-XE-acl:extended": [
        {
            "name": '. $newaclname .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequence .'",
                    "ace-rule": {
                        "action": "'. $newaclaction .'",
                        "protocol": "'. $newaclprotocol .'",
                        "ipv4-address": "'. $newaclsourceip .'",
                        "mask": "'. $newaclsourcemask .'",
                        "dst-host": "'. $newacldestinationip .'"
                    }
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
// echo $response;
}
?>
























<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a DELETE request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/
* The expected result of this block is to allow the user to Delete an extended acl.
*/
if(isset($_POST["submitTwo"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended/',
  CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-acl:extended": {

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
* Variables Used: $newaclnamestandard, $newaclsequencestandar, $newaclactionstandard, $newaclhoststandard
* Parameters sent: ACL name, Acl Sequence, ACL standard, acl hostip
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to configure an standard acl.
* Source
* Character name.
*/
if(isset($_POST["submitFour"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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
    "Cisco-IOS-XE-acl:standard": [
        {
            "name": "'. $newaclnamestandard .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequencestandard .'",
                    "'. $newaclactionstandard .'": {
                        "std-ace": {
                            "ipv4-prefix": "'. $newaclhoststandard .'"
                        }
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclnamestandard, $newaclsequencestandar, $newaclactionstandard, $newaclhoststandard
* Parameters sent: ACL name, Acl Sequence, ACL standard, acl hostip
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to configure an standard acl.
* Source
* Numeric name.
*/
if(isset($_POST["submitFour"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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
    "Cisco-IOS-XE-acl:standard": [
        {
            "name": '. $newaclnamestandard .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequencestandard .'",
                    "'. $newaclactionstandard .'": {
                        "std-ace": {
                            "ipv4-prefix": "'. $newaclhoststandard .'"
                        }
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclnamestandard, $newaclsequencestandar, $newaclactionstandard, $newaclhoststandard, $newaclhostanystandard 
* Parameters sent: ACL name, Acl Sequence, ACL standard, any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to configure an standard acl.
* Source - Any
* Character name.
*/
if(isset($_POST["submitFour"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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
    "Cisco-IOS-XE-acl:standard": [
        {
            "name": "'. $newaclnamestandard .'",
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequencestandard .'",
                    "'. $newaclactionstandard .'": {
                        "std-ace": {
                            "'. $newaclhostanystandard .'": [
                                null
                            ]
                        }
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: $newaclnamestandard, $newaclsequencestandar, $newaclactionstandard, $newaclhoststandard, $newaclhostanystandard 
* Parameters sent: ACL name, Acl Sequence, ACL standard, any
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PATCH request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to configure an standard acl.
* Source - Any
* Numeric name.
*/
if(isset($_POST["submitFour"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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
    "Cisco-IOS-XE-acl:standard": [
        {
            "name": '. $newaclnamestandard .',
            "access-list-seq-rule": [
                {
                    "sequence": "'. $newaclsequencestandard .'",
                    "'. $newaclactionstandard .'": {
                        "std-ace": {
                            "'. $newaclhostanystandard .'": [
                                null
                            ]
                        }
                    }
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
// echo $response;
}
?>
<?php
/* 
* Variables Used: None 
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a DELETE request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to delete an standard acl.
*/
if(isset($_POST["submitFive"])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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
// echo $response;
}
?>
<h3>Extended ACL</h3>
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended
* The expected result of this block is to allow the user to View an extended acl.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:extended',
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
<h3>Standard ACL</h3>
<?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard
* The expected result of this block is to allow the user to View an standard acl.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/access-list/Cisco-IOS-XE-acl:standard',
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