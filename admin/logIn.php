<?
include "display.php";

if (!session_is_registered('id')) 
{

	session_start(); 
	$username = $_GET['username'];
	$password = $_GET['password'];
	$debug = $_GET['debug'];
	$vidyoportal = $_GET['vidyoportal'];

	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['debug']=$debug;
	$_SESSION['vidyoportal']=$vidyoportal;
}
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 


// Create the Soap Client
$client = new SoapClient("http://$vidyoportal/services/VidyoPortalUserService?wsdl", 
						 array('login' => $username,
							   'password' => $password,
							   'trace' => 1, 
							   'exceptions' => 1,
							   'soap_version' => SOAP_1_2))
	or exit("Unable to create soap client!");

// prepare logIn
try {
	$logInResult = $client->logIn($signInParam);
	$pak = $logInResult->pak;
	
	echo "LogIn Successfull.<br>
	       Portal Access Key (PAK) is $pak <br><br>";
} catch (SoapFault $e){
	echo "SoapFault: " . $e->getMessage() . "<br><br>";
}


// For debugging purposes, print the last SOAP Request and Response
if ($debug == 1) {
	echo"Debugging: print SOAP Request<br>";
	print "Request :".htmlspecialchars($client->__getLastRequest());
	echo"<br><br>";
	echo"Debugging: print SOAP Response<br>";
	print "Response:".htmlspecialchars($client->__getLastResponse());
	echo"<br><br>";
}

display_footer();
?>
