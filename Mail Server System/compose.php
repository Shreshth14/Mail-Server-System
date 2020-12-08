<?php
$user=$_SESSION['user'];
if(isset($_POST['send']))
{
	$to=$_POST['to'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	if(file_exists("User_Data/$to"))
	{
	//for recever
	$subj=$user." ".$sub;
	$fo=fopen("User_Data/$to/inbox/$subj","w");
	fwrite($fo,$msg);
	//for sender
	$subj1=$to." ".$sub;
	$fo1=fopen("User_Data/$user/sent/$subj1","w");
	fwrite($fo1,$msg);
	$err="<font color='green'>Message successfully sent</font>";
	}
	else
	{
	// for recever
	//for recever
	$subj=$to." ".$sub."Message Failed";
	$fo=fopen("User_Data/$user/inbox/$subj","w");
	fwrite($fo,$msg);
	// for sender
	$subj1=$to." ".$sub;
	$fo1=fopen("User_Data/$user/sent/$subj1","w");
	fwrite($fo1,$msg);
	$err="<font color='green'>Message Failed</font>";
	}
}
if(isset($_POST['save']))
{
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	$subj=$user." ".$sub;
	$fo=fopen("User_Data/$user/draft/$subj","w");
	fwrite($fo,$msg);
	$err="<font color='blue'>Message successfully saved</font>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>User Free Write Your </title>
<style>
input{width:500px;border-radius:10px;background-color:#FF99FF;color:#0000FF}
textarea{border-radius:10px;background-color:#FF99FF;color:#0000FF}
input[type=submit]:hover{background:pink}
input[type=reset]:hover{background:pink}
input[type=submit]{width:100px}
input[type=reset]{width:100px}
</style>
</head>
<body>
<table border="" width="100%" height="100%" align="center" bgcolor="#999999">
<form method="post">
			<tr>
				<td colspan="2" align="center"><?php echo @$err;?></td>
			</tr>
			<tr>
				<td width="57">To :</td>
				<td width="447"><input type="email" placeholder="abc@gmail.com" name="to"></td>
			</tr>
			<tr>
				<td>Subject :</td>
				<td><input type="text" placeholder="Enter Subject" name="sub"></td>
			</tr>
			<tr>
				<td>Message :</td>
				<td><textarea placeholder="Write Your Message" rows="25" cols="70" name="msg"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Send" name="send"/>
				<input type="submit" value="Save" name="save">
				</td>
			</tr>
</form>
</table>
</body>
</html>
