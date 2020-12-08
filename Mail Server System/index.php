<?php session_start(); ?>
<?php include('templates/header.php');?>		
</center>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>VIT Mail</title>
<style>
body{margin-top:-90px}
table{margin:auto;}
a{border-radius:2px;text-decoration:none;margin-left:8%;font-size:25px}
a:hover{color:white;background:black}
</style>
</head>
<body>
<table width="100%" height="100%" border="0">
  <tr>
    <td height="70" colspan="2" bgcolor="#663399"><h1 align="center"><font color="#FFFF00" face="Trebuchet MS">Mailing Server</h1></td>
  </tr>
  <tr>
    <td height="42" colspan="2" bgcolor="white"	>
	<a href="index.php">HOME</a>
	<a href="index.php?option=about">ABOUT</a>
	<a href="index.php?option=registration">REGISTRATION</a>
	<a href="index.php?option=login">LOGIN</a>
	</td>
  </tr>
  <tr>
    <td width="801" height="450" valign="top" bgcolor="#FFCCFF">
	<?php
	@$opt=$_GET['option'];
	//echo $opt;
	if($opt=="")
	{
	?>
<br><br>
<font size="4"><p>
	This project provide services to exchange or transfer the mail.
To hold data we using only file system instead database.
In this project we exchange or transfer the mail using file system .
This project is work similar to gmail system. User information stored inside the directory.

Session is used to hold the particular user details:Each time when a new user login or registration.
Session keep the details of the particular user.

Login Page permits only existing user to login the mailserver page.
Compose is used to sent mail whose email address is matched ,compose and hit send, sent mail reached to recipient email address inbox with message and attachment.
All received mail collected on inbox. all received mail are shown in inbox.
draft is hold the copy of send mail. copy of a sent mail is also stored in a sent

User can change the password: first check the existing password(old password), then new-password or confirm password must matched.
it replace old password with new password.now user can login with new generated password.</p>
</font>
	<br/>
	<?php
	}
	else
	{
	switch($opt)
	{
	case 'login';
	include('login.php');
	break;
	case 'about';
	include('about.php');
	break;
	case 'service';
	include('services.php');
	break;
	case 'registration';
	include('regis.php');
	break;
	case 'contact';
	include('contact.php');
	break;
	case 'fpass';
	include('forgotpass.php');
	break;
	}
	}
	?>
	

</table>
</body>
</html>