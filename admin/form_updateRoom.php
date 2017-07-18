<?
include "display.php";

display_header();

?>
<div align=center>

<h2>updateRoom API</h2>

<form name="input" action="updateRoom.php" method="get">
<table>
	<tr>
	<td>roomID</td>
	<td><input type="text" name="roomID" /></td>
	</tr>
	
	<tr>
	<td>Room Information</td>
	</tr>
	<tr>
	<td>name</td>
	<td><input type="text" name="name" /></td>
	</tr>
	<tr>
	<td>RoomType</td>
	<td>(<input type="radio" name="RoomType" value="Personal"/> Personal) 
	<input type="radio" name="RoomType" value="Public" checked /> Public 
	</tr>
	<tr>
	<td>ownerName</td>
	<td><input type="text" name="ownerName" /></td>
	</tr>
	<tr>
	<td>extension</td>
	<td><input type="text" name="extension" /></td>
	</tr>
	<tr>
	<td>groupName</td>
	<td><input type="text" name="groupName" /></td>
	</tr>
	<tr>
	<td>RoomMode</td>
	<td><input type="checkbox" name="isLocked"/> isLocked 
	<input type="checkbox" name="hasPin" value="Normal"/> hasPin, 
	roomPIN <input type="text" name="roomPIN"/></td>
	</tr>
	<tr>
	<td>description</td>
	<td><input type="text" name="description" /></td>
	</tr>

</table>
<input type="submit" value="UpdateRoom" />
</form>
<br><br>
<?
display_footer();
?>