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

// prepare update room
if( $roomID = $_GET['roomID'] ) {
	$room = array();

	$getRoomParam = array('roomID' => $roomID);
	try {
		$getRoomResult = $client->getRoom($getRoomParam);
		$room = $getRoomResult->room;
	} catch (SoapFault $e) {
		echo "SoapFault: " . $e->getMessage() . "<br><br>";
	}
	
	//set parameter to update
	if( $name = $_GET['name'] ) $room->name = $name;
	if( $RoomType = $_GET['RoomType'] ) $room->RoomType = $RoomType;
	if( $ownerName = $_GET['ownerName'] ) $room->ownerName = $ownerName;
	if( $extension = $_GET['extension'] ) $room->extension = $extension;
	if( $groupName = $_GET['groupName'] ) $room->groupName = $groupName;
	if( $isLocked = $_GET['isLocked'] ) $room->RoomMode->isLocked = $isLocked;
	if( $hasPin = $_GET['hasPin'] ) {
		$room->RoomMode->hasPin = $hasPin;
		$room->RoomMode->roomPIN = $_GET['roomPIN'];
	}
	if( $description = $_GET['description'] ) $room->description = $description;
	
	try {
		$updateRoomParam = array('roomID' => $roomID, 'room' => $room);
		$updateRoomResult = $client->updateRoom($updateRoomParam);
		$updateRoomResult = $updateRoomResult->OK;
		echo "Update Room result is $updateRoomResult<br><br>";
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
