<?
include "display.php";

display_header();

?>
<div align=center>

<h2>getMember API</h2>

<form name="input" action="getMember.php" method="get">
<table>
	<tr>
	<td>memberID</td>
	<td><input type="text" name="memberID" /></td>
	</tr>
</table>
<input type="submit" value="GetMember" />
</form>
<br><br>
<?
display_footer();
?>