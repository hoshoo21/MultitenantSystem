<?
include "display.php";

display_header();

?>
<div align=center>

<h2>deleteGroup API</h2>

<form name="input" action="deleteGroup.php" method="get">
<table>
	<tr>
	<td>groupID</td>
	<td><input type="text" name="groupID" /></td>
	</tr>
</table>
<input type="submit" value="DeleteGroup" />
</form>
<br><br>
<?
display_footer();
?>