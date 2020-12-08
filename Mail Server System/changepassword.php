<?php
if(isset($_POST['c']))
{
$user=$_SESSION['user'];
$op=$_POST['op'];
$np=$_POST['np'];
$cp=$_POST['cp'];
	if(file_exists("User_Data/$user/$op"))
	{
		if($np==$cp)
		{
		rename("User_Data/$user/$op","User_Data/$user/$np");
		$err="<font color='blue'>Password Successfully Change</font>";
		}
		else
		{
		$err="<font color='red'>Confirm Password Does Not Match</font>";
		}
	}
	else
	{
	$err="<font color='green'>Old Password Does Not Match</font>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>change password page</title>
</head>
<body>
<form method="post">
<table width="288" border="1">
  <caption><font color="#660066" face="cursive" size="+2">Change Password By User</font></caption>
  <tr>
    <td colspan="2" align="center"><?php echo @$err; ?></td>
  </tr>
  <tr>
    <td width="128">Old Password</td>
    <td width="144"><input type="password" placeholder="ex:-123456789" name="op"/></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><input type="password" placeholder="ex:-123456789" name="np"/></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" placeholder="ex:-123456789"name="cp"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input  type="submit" value="Change Password" name="c"/></td>
  </tr>
</table>
</form>
</body>
</html>
