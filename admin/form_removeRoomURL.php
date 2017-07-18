<?
include "display.php";

display_header();

?>
<div align=center>

<h2>removeRoomURL API</h2>

<form name="input" action="removeRoomURL.php" method="get">
<table>
	<tr>
	<td>roomID</td>
	<td><input type="text" name="roomID" /></td>
	</tr>
</table>
<input type="submit" value="RemoveRoomURL" />
</form>
<br><br>
<?
display_footer();
?>