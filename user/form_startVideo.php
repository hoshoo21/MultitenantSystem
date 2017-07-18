<?
include "display.php";

display_header();

?>
<div align=center>

<h2>startVideo API</h2>

<form name="input" action="startVideo.php" method="get">
<table>
	<tr>
	<td>participantID</td>
	<td><input type="text" name="participantID" /></td>
	</tr>
</table>
<input type="submit" value="StartVideo" />
</form>
<br><br>
<?
display_footer();
?>