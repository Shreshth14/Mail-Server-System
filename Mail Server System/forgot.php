<?php
//error_reporting(0);
if(isset($_POST['rp']))
{
	$email=$_POST['e'];
	$fmn=$_POST['fmn'];
    $newp=$_POST['np'];
	$conp=$_POST['cp'];
	/*$num=rand(99,999);
	$rpass=md5($num);
	$x=substr($rpass,5,5);
	echo $x;*/
	//mail($email,"subj:password recorver",$x,"From:abc.com");
	
	if(file_exists("User_Data/$email") && file_exists("User_Data/$email/$fmn"))
	{

			if($newp==$conp)
			{
			//$fo=fopen("User_Data/$email/");
			$op=opendir("User_Data/$email/password/");
			$r=readdir("$op");
			echo $r;
			rename("User_Data/$email/$r","User_Data/$email/$newp");
			$msg="<font color='green'>Password Successfully Reset</font>";
			}
			else
			{
			$msg="<font color='blue' face='cursive'>Confirm Password Does Not Match</font>";
			}
		}
		else
		{
		$msg="<font color='red' face='cursive'>First Mobile Number Does Not Match.......</font>";
		}
	}
	else
		{
		$msg="<font color='red' face='cursive'>Email Id Does Not Exists.......</font>";
		}		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>forgot password</title>
</head>
<body>
<table border="0">
	<caption><h1>Recovering Password.... </h1>
	</caption>
		<form method="post" enctype="multipart/form-data">
			<tr>
				<td colspan="2"><?php echo @$msg;?></td>
			</tr>
			<tr>
				<td width="173">Your Email Id</td>
			  <td width="145"><input type="email" placeholder="abc@gmail.com" name="e"></td>
			</tr>
			<tr>
				<td>Your First Phone Number</td>
                <td><input type="text" placeholder="Enter First Phone Number" name="fmn"></td>
            </tr> 
			<tr>
                <td>Your New Password</td>
                <td><input type="password" placeholder="Enter New Password" name="np"></td>
            </tr>
			<tr>
                <td>Your Confirm Password</td>
                <td><input type="password" placeholder="Enter Confirm Password" name="cp"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Reset Password" name="rp"></td>
            </tr>
  </form>
</table>          
</body>
</html>
