<?
include "display.php";

display_header();

?>
<div align=center>

<h2>getGroup API</h2>

<form name="input" action="getGroup.php" method="get">
<table>
	<tr>
	<td>groupID</td>
	<td><input type="text" name="groupID" /></td>
	</tr>
</table>
<input type="submit" value="GetGroup" />
</form>
<br><br>
<?
display_footer();
?>