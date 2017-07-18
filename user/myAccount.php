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

// prepare My Account
try {
	$myAccountResult = $client->myAccount($myAccountParam);
	$entity = $myAccountResult->Entity;

	echo "My Account Information:<br><br>";
	echo "entityID is $entity->entityID<br>";
	echo "participantID is $entity->participantID<br>";
	echo "EntityType is $entity->EntityType<br>";
	echo "displayName is $entity->displayName<br>";
	echo "extension is $entity->extension<br>";
	echo "description is $entity->description<br>";
	echo "Language is $entity->Language<br>";
	echo "MemberStatus is $entity->MemberStatus<br>";
	echo "MemberMode is $entity->MemberMode<br>";
	echo "canCallDirect is $entity->canCallDirect<br>";
	echo "canJoinMeeting is $entity->canJoinMeeting<br>";
	echo "RoomStatus is $entity->RoomStatus<br>";
	$erm = $entity->RoomMode;
	echo "RoomMode: RoomURL is $erm->roomURL, isLocked is $erm->isLocked, hasPin is $erm->hasPin, roomPIN is $erm->roomPIN<br>";
	echo "canControl is $entity->canControl<br>";
	echo "audio is $entity->audio<br>";
	echo "video is $entity->video<br>";
	echo "appshare is $entity->appshare<br><br>";
} catch (SoapFault $e) {
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
