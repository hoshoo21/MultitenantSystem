<?
include "display.php";

display_header();

?>
<div align=center>

<h2>createRoomURL API</h2>

<form name="input" action="createRoomURL.php" method="get">
<table>
	<tr>
	<td>roomID</td>
	<td><input type="text" name="roomID" /></td>
	</tr>
</table>
<input type="submit" value="CreateRoomURL" />
</form>
<br><br>
<?
display_footer();
?>