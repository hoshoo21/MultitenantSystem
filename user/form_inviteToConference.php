<?
include "display.php";

display_header();

?>
<div align=center>

<h2>inviteToConference API</h2>

<form name="input" action="inviteToConference.php" method="get">
<table>
        <tr>
        <td>ConferenceID</td>
        <td><input type="text" name="add_confID" /></td>
        </tr>
	<tr>
	<td>entityID</td>
	<td><input type="text" name="add_entityID" /></td>
	</tr>
</table>
<input type="submit" value="InviteToConference" />
</form>
<br><br>
<?
display_footer();
?>
