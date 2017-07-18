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

// prepare search
$filter = array();
if( $start = $_GET['start'] ) $filter['start'] = $start;
if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
if( $entityType = $_GET['entityType'] ) $filter['entityType']= $entityType;
if( $query = $_GET['query'] ) $filter['query'] = $query;

$searchParam = array('Filter' => $filter);
$c = 1;
try {
	$searchResult = $client->search($searchParam);
	echo "The number of searched entities is $searchResult->total<br><br>";
	
	foreach( $searchResult->Entity as $Entity)
	{
	echo "$c: My Account Information:<br><br>";
	echo "entityID is $Entity->entityID<br>";
	echo "participantID is $Entity->participantID<br>";
	echo "EntityType is $Entity->EntityType<br>";
	echo "displayName is $Entity->displayName<br>";
	echo "extension is $Entity->extension<br>";
	echo "description is $Entity->description<br>";
	echo "Language is $Entity->Language<br>";
	echo "MemberStatus is $Entity->MemberStatus<br>";
	echo "MemberMode is $Entity->MemberMode<br>";
	echo "canCallDirect is $Entity->canCallDirect<br>";
	echo "canJoinMeeting is $Entity->canJoinMeeting<br>";
	echo "RoomStatus is $Entity->RoomStatus<br>";
	$erm = $Entity->RoomMode;
	echo "RoomMode: RoomURL is $erm->roomURL, isLocked is $erm->isLocked, hasPin is $erm->hasPin, roomPIN is $erm->roomPIN<br>";
	echo "canControl is $Entity->canControl<br>";
	echo "audio is $Entity->audio<br>";
	echo "video is $Entity->video<br>";
	echo "appshare is $Entity->appshare<br><br>";
	$c++;
	}
	
	
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
