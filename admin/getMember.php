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

// prepare get member
if( $memberID = $_GET['memberID'] ) {
	$getMemberParam = array('memberID' => $memberID);
	try {
		$getMemberResult = $client->getMember($getMemberParam);
		$member = $getMemberResult->member;
		echo "memberID is $member->memberID<br>";
		echo "name is $member->name<br>";
		echo "password is $member->password<br>";
		echo "displayName is $member->displayName<br>";
		echo "extension is $member->extension<br>";
		echo "Language is $member->Language<br>";
		echo "RoleName is $member->RoleName<br>";
		echo "groupName is $member->groupName<br>";
		echo "proxyName is $member->proxyName<br>";
		echo "emailAddress is $member->emailAddress<br>";
		echo "created is $member->created<br>";
		echo "description is $member->description<br>";
		echo "allowCallDirect is $member->allowCallDirect<br>";
		echo "allowPersonalMeeting is $member->allowPersonalMeeting<br>";
		echo "<br>";
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
