<?
include "display.php";

display_header();

?>
<div align=center>

<h2>addMember API</h2>

<form name="input" action="addMember.php" method="get">
<table>
	<tr>
	<td>memberID</td>
	<td><input type="text" name="memberID" /></td>
	</tr>
	<tr>
	<td>Member Information</td>
	</tr>
	<tr>
	<td>name<font color=red>(*)</font></td>
	<td><input type="text" name="name" /></td>
	</tr>
	<tr>
	<td>password<font color=red>(*)</font></td>
	<td><input type="text" name="password" /> (not hiding for debug)</td>
	</tr>
	<tr>
	<td>displayName<font color=red>(*)</font></td>
	<td><input type="text" name="displayName" /></td>
	</tr>
	<tr>
	<td>extension<font color=red>(*)</font></td>
	<td><input type="text" name="extension" /></td>
	</tr>
	<tr>
	<td>Language<font color=red>(*)</font></td>
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
	<td>RoleName<font color=red>(*)</font></td>
	<td><input type="radio" name="RoleName" value="Admin"/> Admin 
	<input type="radio" name="RoleName" value="Operator"/> Operator 
	<input type="radio" name="RoleName" value="Normal"/> Normal 
	<input type="radio" name="RoleName" value="VidyoRoom"/> VidyoRoom 
	<input type="radio" name="RoleName" value="Legacy"/> Legacy </td>
	</tr>
	<tr>
	<td>groupName<font color=red>(*)</font></td>
	<td><input type="text" name="groupName" /></td>
	</tr>
	<tr>
	<td>proxyName</td>
	<td><input type="text" name="proxyName" /></td>
	</tr>
	<tr>
	<td><font color=red>*</font>emailAddress</td>
	<td><input type="text" name="emailAddress" /></td>
	</tr>
	<tr>
	<td>created</td>
	<td><input type="text" name="created" /></td>
	</tr>
	<tr>
	<td>description</td>
	<td><input type="text" name="description" /></td>
	</tr>
	<tr>
	<td>allowCallDirect</td>
	<td><input type="checkbox" name="allowCallDirect" /></td>
	</tr>
	<tr>
	<td>allowPersonalMeeting</td>
	<td><input type="checkbox" name="allowPersonalMeeting" /></td>
	</tr>

</table>
<input type="submit" value="AddMember" />
</form>
<br><br>
<?
display_footer();
?>