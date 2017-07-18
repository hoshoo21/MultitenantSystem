<?
include "display.php";

display_header();

?>
<div align=center>

<h2>addGroup API</h2>

<form name="input" action="addGroup.php" method="get">
<table>
	<tr>
	<td>groupID</td>
	<td><input type="text" name="groupID" /></td>
	</tr>
	<tr>
	<td>Group Information</td>
	</tr>
	<tr>
	<td>name<font color=red>(*)</font></td>
	<td><input type="text" name="name" /></td>
	</tr>
	<tr>
	<td>roomMaxUsers<font color=red>(*)</font></td>
	<td><input type="text" name="roomMaxUsers" /></td>
	</tr>
	<tr>
	<td>userMaxBandWidthIn<font color=red>(*)</font></td>
	<td><input type="text" name="userMaxBandWidthIn" /></td>
	</tr>
	<tr>
	<td>userMaxBandWidthOut<font color=red>(*)</font></td>
	<td><input type="text" name="userMaxBandWidthOut" /></td>
	</tr>
	<tr>
	<td>description</td>
	<td><input type="text" name="description" /></td>
	</tr>
	<tr>
	<td>primaryVRPool<font color=red>(*)</font></td>
	<td><input type="text" name="primaryVRPool" /></td>
	</tr>
	<tr>
	<td>secondaryVRPool<font color=red>(*)</font></td>
	<td><input type="text" name="secondaryVRPool" /></td>
	</tr>


</table>
<input type="submit" value="AddGroup" />
</form>
<br><br>
<?
display_footer();
?>