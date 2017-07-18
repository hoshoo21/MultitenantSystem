<?
include "display.php";

display_header();

?>
<div align=center>

<h2>unmuteAudio API</h2>

<form name="input" action="unmuteAudio.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
	<td><input type="text" name="conferenceID" /></td>
	</tr>
	<tr>
	<td>participantID</td>
	<td><input type="text" name="participantID" /></td>
	</tr>
</table>
<input type="submit" value="unMuteAudio" />
</form>
<br><br>
<?
display_footer();
?>