<?
include "display.php";

display_header();

?>
<div align=center>

<h2>updateMember API</h2>

<form name="input" action="updateMember.php" method="get">
<table>
	<tr>
	<td>memberID</td>
	<td><input type="text" name="memberID" /></td>
	</tr>
	<tr>
	<td>Member Information</td>
	</tr>
	<tr>
	<td>name</td>
	<td><input type="text" name="name" /></td>
	</tr>
	<tr>
	<td>password</td>
	<td><input type="text" name="password" /> (not hiding for debug)</td>
	</tr>
	<tr>
	<td>displayName</td>
	<td><input type="text" name="displayName" /></td>
	</tr>
	<tr>
	<td>extension</td>
	<td><input type="text" name="extension" /></td>
	</tr>
	<tr>
	<td>New Language</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="en"/> English</td>
	<td><input type="radio" name="Language" value="de"/> German</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="es"/> Espagnole</td>
	<td><input type="radio" name="Language" value="fr"/> French</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="it"/> Italian</td>
	<td><input type="radio" name="Language" value="ja"/> Japanese</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="ko"/> Korean</td>
	<td><input type="radio" name="Language" value="pt"/> Portuguese</td>
	</tr>
	<tr>
	<td><input type="radio" name="Language" value="zh_CN"/> Chinese</td>
	<td></td>
	</tr>
	<tr>
	<td>RoleName</td>
	<td><input type="text" name="RoleName" /></td>
	</tr>
	<tr>
	<td>groupName</td>
	<td><input type="text" name="groupName" /></td>
	</tr>
	<td>proxyName</td>
	<td><input type="text" name="proxyName" /></td>
	</tr>
	<td>emailAddress</td>
	<td><input type="text" name="emailAddress" /></td>
	</tr>
	<td>created</td>
	<td><input type="text" name="created" /></td>
	</tr>
	<td>description</td>
	<td><input type="text" name="description" /></td>
	</tr>
	<td>allowCallDirect</td>
	<td><input type="checkbox" name="allowCallDirect" /></td>
	</tr>
	<td>allowPersonalMeeting</td>
	<td><input type="checkbox" name="allowPersonalMeeting" /></td>
	</tr>

</table>
<input type="submit" value="UpdateMember" />
</form>
<br><br>
<?
display_footer();
?>