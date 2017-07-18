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

// prepare update member
if( $memberID = $_GET['memberID'] ) {
	$member = array();
	
	//getMember to set current value
	$getMemberParam = array('memberID' => $memberID);
	try {
		$getMemberResult = $client->getMember($getMemberParam);
	} catch (SoapFault $e) {
		echo "SoapFault: " . $e->getMessage() . "<br><br>";
	}
	$member = $getMemberResult->member;
	
	//set parameter to update
	if( $name = $_GET['name'] ) $member->name = $name;
	if( $password = $_GET['password'] ) $member->password = $password;
	if( $displayName = $_GET['displayName'] ) $member->displayName = $displayName;
	if( $extension = $_GET['extension'] ) $member->extension = $extension;
	if( $Language = $_GET['Language'] ) $member->Language = $Language;
	if( $RoleName = $_GET['RoleName'] ) $member->RoleName = $RoleName;
	if( $groupName = $_GET['groupName'] ) $member->groupName = $groupName;
//	if( $proxyName = $_GET['proxyName'] ) $member->proxyName = $proxyName;
	unset($member->proxyName); //TBD

	if( $emailAddress = $_GET['emailAddress'] ) $member->emailAddress = $emailAddress;
	if( $created = $_GET['created'] ) $member->created = $created;
	if( $description = $_GET['description'] ) $member->description = $description;
	if( $allowCallDirect = $_GET['allowCallDirect'] ) $member->allowCallDirect = $allowCallDirect;
	if( $allowPersonalMeeting = $_GET['allowPersonalMeeting'] ) $member->allowPersonalMeeting = $allowPersonalMeeting;
	
	try {
		$updateMemberParam = array('memberID' => $memberID, 'member' => $member);
		$updateMemberResult = $client->updateMember($updateMemberParam);
		$updateMemberResult = $updateMemberResult->OK;
		echo "Update Member result is $updateMemberResult<br><br>";
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
