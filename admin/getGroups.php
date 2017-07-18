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
$filter = array();
if( $start = $_GET['start'] ) $filter['start'] = $start;
if( $limit = $_GET['limit'] ) $filter['limit'] = $limit;
if( $sortBy = $_GET['sortBy'] ) $filter['sortBy'] = $sortBy;
if( $dir = $_GET['dir'] ) $filter['dir']= $dir;
if( $EntityType = $_GET['EntityType']) $filter['EntityType'] = $EntityType;
if( $query = $_GET['query'] ) $filter['query'] = $query;

$getGroupsParam = array('Filter' => $filter);
try {
	$getGroupsParamResult = $client->getGroups($searchParam);
	echo "The number of searched entities is $getGroupsParamResult->total<br><br>";
	
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
