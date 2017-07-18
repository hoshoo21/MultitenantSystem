<?
include "display.php";

display_header();

?>
<div align=center>

<h2>removeRoomPIN API</h2>

<form name="input" action="removeRoomPIN.php" method="get">
<table>
	<tr>
	<td>roomID</td>
	<td><input type="text" name="roomID" /></td>
	</tr>
</table>
<input type="submit" value="RemoveRoomPIN" />
</form>
<br><br>
<?
display_footer();
?>