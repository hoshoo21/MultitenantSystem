<?
if (!session_is_registered('id')) 
{
	session_register('id');
	$EId = $_SESSION['id'];

	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$debug=$_SESSION['debug'];
	$entityId = $_SESSION['entityId'];
	$vidyoportal = $_SESSION['vidyoportal'];
}

include "display.php";
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

echo "Entity Id is $entityId <br><br>";

// prepare create room url
$createRoomURLParam = array('roomID' => $entityId);
try {
	$createRoomURLResult = $client->createRoomURL($createRoomURLParam);
	$createRoomURLResult = $createRoomURLResult->OK;
	echo "Create Room URL result is $createRoomURLResult<br><br>";
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
