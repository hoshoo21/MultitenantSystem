<?
session_start(); 
include "display.php";

display_header();

?>
<div align=center>

<h2>logIn API</h2>

<form name="input" action="logIn.php" method="get">
<table>
	<tr>
	<td>Username</td>
	<td><input type="text" name="username" /></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password" /></td>
	</tr>
	<tr>
	<td><br>Server Information</td>
	</tr>
	<tr>
	<td>VidyoPortal/VidyoManager</td>
	<td><input type="text" name="vidyoportal" value="dev20.vidyo.com" /> (Please change as you like)</td>
	</tr>
</table>
<input type="submit" value="Signin" />
</form>
<br><br>
<?
display_footer();
?>
