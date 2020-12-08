<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include 'index.php';?>
<?php
// define variables and set to empty values
$Hostname = 
$bannerExec = 
$bannerMotd = 
$bannerLogin = 

$servicePasswordEn = 
$serviceLog = 

$ews = "";
$domainName = "paul.com";
$sshversion = "2";
$password = "test";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Hostname = test_input($_POST["Hostname"]);
  $bannerExec = test_input($_POST["bannerExec"]);
  $bannerMotd = test_input($_POST["bannerMotd"]);
  $bannerLogin = test_input($_POST["bannerLogin"]);
  $domainName = test_input($_POST["domainName"]);
  $sshversion = test_input($_POST["sshversion"]);
    $password = test_input($_POST["password"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Basic Config</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Hostname: <input type="text" name="Hostname">
  <br>
      Banner Exec: <input type="text" name="bannerExec">
  <br>
      Banner MOTD: <input type="text" name="bannerMotd">
  <br>
      Banner Login: <input type="text" name="bannerLogin">
  <br>

        Domain Name: <input type="text" name="domainName">
  <br>
          SSH Version <input type="text" name="sshversion">
  <br>
            Enable password <input type="text" name="password">
  <br>
    <input type="submit" name="submit" value="Submit">  
  </form>

<?php
/* 
* Variables Used: $Hostname
* Parameters sent: hostname
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/hostname
* The expected result of this block is to allow the user to configure a hostname.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/hostname',
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
    "Cisco-IOS-XE-native:hostname": "'. $Hostname .'"
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
* Variables Used: $bannerExec, $bannerMotd, $bannerLogin
* Parameters sent: Exec banner, Message of the day banner, login banner
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner
* The expected result of this block is to allow the user to configure a banner.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner',
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
    "Cisco-IOS-XE-native:banner": {
        "exec": {
            "banner": "^C'. $bannerExec .'^C"
        },
        "login": {
            "banner": "^C'. $bannerMotd .'^C"
        },
        "motd": {
            "banner": "^C'. $bannerLogin .'^C"
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
?>
<?php
/* 
* Variables Used: $domainName
* Parameters sent: Domain name
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/domain
* The expected result of this block is to allow the user to configure a domain name.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/domain',
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
    "Cisco-IOS-XE-native:domain": {
        "name": "'. $domainName .'"
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
* Variables Used: $sshversion
* Parameters sent: ssh version
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/ssh
* The expected result of this block is to allow the user to configure a ssh version.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/ssh',
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
    "Cisco-IOS-XE-native:ssh": {
        "rsa": {
            "keypair-name": "ssh-key"
        },
        "version": '. $sshversion .'
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
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service
* The expected result of this block is to allow the user to configure services.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "Cisco-IOS-XE-native:service": {
        "password-encryption": [
            null
        ],
        "timestamps": {
            "debug": {
                "datetime": {
                    "msec": {}
                }
            },
            "log": {
                "datetime": {
                    "msec": [
                        null
                    ]
                }
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
?>
<?php
/* 
* Variables Used: $password
* Parameters sent: enable password
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a PUT request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/enable
* The expected result of this block is to allow the user to configure a password.
*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/enable',
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
    "Cisco-IOS-XE-native:enable": {
        "password": {
            "secret": "'. $password .'"
        },
        "secret": {
            "type": "5",
            "secret": "$1$20ue$uC.uSGo6nvfWs63EjjzRP."
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/yang-data+json',
    'Authorization: Basic ZGV2ZWxvcGVyOkMxc2NvMTIzNDU=',
    'Content-Type: application/yang-data+json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
<h3>Hostname</h3>

  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/hostname
* The expected result of this block is to allow the user to view the configured hostname.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/hostname',
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
<h3>Services Password Encryption</h3>

   <?php
     /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/password-encryption
* The expected result of this block is to allow the user to view the configured Servince: Password Encryption.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/password-encryption',
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

<h3>Services Timestamps Debug</h3>

   <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/timestamps/debug
* The expected result of this block is to allow the user to view the configured Servince: Debug.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/timestamps/debug',
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


<h3>Services Timestamps Log</h3>

   <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/timestamps/log
* The expected result of this block is to allow the user to view the configured Servince: Timestamps log.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/service/timestamps/log',
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

<h3>Banner Exec</h3>

 <?php
 /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/exec
* The expected result of this block is to allow the user to view the configured Banner: exec.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/exec',
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

<h3>Banner Motd</h3>

  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/motd
* The expected result of this block is to allow the user to view the configured Banner: message of the day.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/motd',
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

<h3>Banner Login</h3>

  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/login
* The expected result of this block is to allow the user to view the configured Banner: login.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/banner/login',
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


<h3>SSH Version</h3>

  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/ssh/version
* The expected result of this block is to allow the user to view the configured ssh version.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/ssh/version',
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

<h3>Password</h3>

  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/enable/password/secret
* The expected result of this block is to allow the user to view the configured password.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/enable/password/secret',
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
<h3>Username</h3>
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/username
* The expected result of this block is to allow the user to view the configured username.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/username',
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
<h3>Domain Name</h3>
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/domain
* The expected result of this block is to allow the user to view the configured domain name.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/ip/domain',
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
<h3>Version</h3>
  <?php
  /* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/version
* The expected result of this block is to allow the user to view the configured version on router.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/version',
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
<h3>IOS Info</h3>
  <?php
/* 
* Variables Used: None
* Parameters sent: None
* Username Developer
* Password C1sco12345
* Data structure application/yang-data+json
* This block sends a GET request to the router.
* The URL called is: https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/platform
* The expected result of this block is to allow the user to view the configured platform on router.
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://10.10.20.48/restconf/data/Cisco-IOS-XE-native:native/platform',
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