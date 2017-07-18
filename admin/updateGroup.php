<?
if (!session_is_registered('id')) 
{
	session_register('id');
	$EId = $_SESSION['id'];

	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$debug=$_SESSION['debug'];
	$entityId = $_SESSION['entityId'];
	$vidyoportal=$_SESSION['vidyoportal'];
}

include "display.php";
display_header();

// Disables the local cache; Use during development. 
// Should be turned OFF for production otherwise might impact performance
ini_set("soap.wsdl_cache_enabled", "0"); 

// Create the Soap Client
$client = new SoapClient("http://$vidyoportal/services/VidyoPortalAdminService?wsdl", 
						 array('login' => $username,
							   'password' => $password,
							   'trace' => 1, 
							   'exceptions' => 1,
							   'soap_version' => SOAP_1_2))
	or exit("Unable to create soap client!");

// prepare update group
if( $groupID = $_GET['groupID'] ) {
	$group = array();
	
	//getGroup to set current value
	$getGroupParam = array('groupID' => $groupID);
	try {
		$getGroupResult = $client->getGroup($getGroupParam);
	} catch (SoapFault $e) {
		echo "SoapFault: " . $e->getMessage() . "<br><br>";
	}
	$group = $getGroupResult->group;
	
	//set parameter to update
	if( $name = $_GET['name'] ) $group->name = $name;
	if( $roomMaxUsers = $_GET['roomMaxUsers'] ) $group->roomMaxUsers = $roomMaxUsers;
	if( $userMaxBandWidthIn = $_GET['userMaxBandWidthIn'] ) $group->userMaxBandWidthIn = $userMaxBandWidthIn;
	if( $userMaxBandWidthOut = $_GET['userMaxBandWidthOut'] ) $group->userMaxBandWidthOut = $userMaxBandWidthOut;
	if( $description = $_GET['description'] ) $group->description = $description;
	if( $primaryVRPool = $_GET['primaryVRPool'] ) $group->primaryVRPool = $primaryVRPool;
	if( $secondaryVRPool = $_GET['secondaryVRPool'] ) $group->secondaryVRPool = $secondaryVRPool;
	
	try {
		$updateGroupParam = array('groupID' => $groupID, 'group' => $group);
		$updateGroupResult = $client->updateGroup($updateGroupParam);
		$updateGroupResult = $updateGroupResult->OK;
		echo "Update Group result is $updateGroupResult<br><br>";
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
