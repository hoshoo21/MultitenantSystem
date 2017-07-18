<?
include "display.php";

display_header();

?>
<div align=center>

<h2>muteAudio API</h2>

<form name="input" action="muteAudio.php" method="get">
<table>
	<tr>
	<td>participantID</td>
	<td><input type="text" name="participantID" /></td>
	</tr>
</table>
<input type="submit" value="MuteAudio" />
</form>
<br><br>
<?
display_footer();
?>