<?
include "display.php";

display_header();

?>
<div align=center>

<h2>updateGroup API</h2>

<form name="input" action="updateGroup.php" method="get">
<table>
	<tr>
	<td>groupID</td>
	<td><input type="text" name="groupID" /></td>
	</tr>
	<tr>
	<td>Group Information</td>
	</tr>
	<tr>
	<td>name</td>
	<td><input type="text" name="name" /></td>
	</tr>
	<tr>
	<td>roomMaxUsers</td>
	<td><input type="text" name="roomMaxUsers" /></td>
	</tr>
	<tr>
	<td>userMaxBandWidthIn</td>
	<td><input type="text" name="userMaxBandWidthIn" /></td>
	</tr>
	<tr>
	<td>userMaxBandWidthOut</td>
	<td><input type="text" name="userMaxBandWidthOut" /></td>
	</tr>
	<tr>
	<td>description</td>
	<td><input type="text" name="description" /></td>
	</tr>
	<tr>
	<td>primaryVRPool</td>
	<td><input type="text" name="primaryVRPool" /></td>
	</tr>
	<tr>
	<td>secondaryVRPool</td>
	<td><input type="text" name="secondaryVRPool" /></td>
	</tr>


</table>
<input type="submit" value="UpdateGroup" />
</form>
<br><br>
<?
display_footer();
?>