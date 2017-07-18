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

// prepare Get Participants
$filter = array();
if( $start = $_GET['start'] ) $filter['start'] = $start;
if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
if( $query = $_GET['query'] ) $filter['query'] = $query;

if( $conferenceID = $_GET['conferenceID'] ) {
//	$getParticipantsParam = array('conferenceID' => $conferenceID, 'Filter' => $filter);
	$getParticipantsParam = array('conferenceID' => $conferenceID);
	try {
		$getParticipantsResult = $client->getParticipants($getParticipantsParam);
		$getParticipantsTotal = $getParticipantsResult->total;
		echo "The number of participants is $getParticipantsTotal<br><br>";
        foreach( $getParticipantsResult->Entity as $Entity)
        {
        	echo "$c: My Account Information:<br><br>";
        	echo "entityID is $Entity->entityID<br>";
	        echo "participantID is $Entity->participantID<br>";
	        echo "EntityType is $Entity->EntityType<br>";
	}
	} catch (SoapFault $e) {
		echo "SoapFault: " . $e->getMessage() . "<br><br>";
	}
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
