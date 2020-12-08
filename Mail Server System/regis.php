<html>
<head>
<?php
if(isset($_POST['save']))
{
	$n=$_POST['n'];
	$e=$_POST['e'];
	$p=$_POST['p'];
	$m=$_POST['m'];
	$a=$_POST['a'];
	$ff=$_POST['ff'];
	if(file_exists('User_Data/$e'))
	{
	$msg="<font color='green' face='Trebuchet MS'>User Already Exists</font>";
	}
	else
	{
	mkdir("User_Data/$e");
	mkdir("User_Data/$e/inbox");
	mkdir("User_Data/$e/sent");
	mkdir("User_Data/$e/draft");
	mkdir("User_Data/$e/spam");
	mkdir("User_Data/$e/trash");
	//mkdir("User_Data/$e/password");
	move_uploaded_file($_FILES['img']['tmp_name'],"User_Data/$e/".$_FILES['img']['name']);
	//echo $_FILES['img']['name'];
	$fo=fopen("User_Data/$e/$p","w");
	$fo1=fopen("User_Data/$e/profile","w");
	$fm=fopen("User_Data/$e/$m","w");
	$mm=fopen("User_Data/$e/$ff","w");
	fwrite($fo1,"Name:$n  Email:$e Password:$p Mobile:$m Address:$a");
	$msg="<font color='green' face='cursive'>You Are Registered</font>";
	}
}

?>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<table border="0" align="center" cellpadding="3">
	<caption><h2>Registration Form</h2></caption>
		<form method="post" enctype="multipart/form-data">
			<tr>
				<td colspan="2"><?php echo @$msg;?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" placeholder="Enter Your Name" name="n"></td>
			</tr>
			<tr>
				<td>Email Id</td>
				<td><input type="email" placeholder="abc@gmail.com" name="e"></td>
			</tr>
			<tr>
				<td>Password</td>
                <td><input type="password" placeholder="Enter Your Password" name="p"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="text" placeholder="Enter Mobile Number" name="m"></td>
            </tr>
			<tr>
                <td>First Phone Number</td>
                <td><input type="text" placeholder="Enter First Phone Number" name="ff"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea placeholder="Enter Your Address" name="a"></textarea></td>
            </tr>
			<tr>
                <td>Upload Your Image</td>
                <td><input type="file" value="" name="img"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Save" name="save">
                                               <input type="reset" value="reset"></td>
            </tr>
        </form>
    </table>
</body>
</html>
