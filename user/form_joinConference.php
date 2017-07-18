<?
include "display.php";

display_header();

?>
<div align=center>

<h2>directCall API</h2>

<form name="input" action="joinConference.php" method="get">
<table>
	<tr>
	<td>conferenceID</td>
	<td><input type="text" name="conferenceID" /></td>
	</tr>
</table>
<input type="submit" value="JoinConference" />
</form>
<br><br>
<?
display_footer();
?>