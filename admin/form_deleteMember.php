<?
include "display.php";

display_header();

?>
<div align=center>

<h2>deleteMember API</h2>

<form name="input" action="deleteMember.php" method="get">
<table>
	<tr>
	<td>memberID</td>
	<td><input type="text" name="memberID" /></td>
	</tr>
</table>
<input type="submit" value="DeleteMember" />
</form>
<br><br>
<?
display_footer();
?>