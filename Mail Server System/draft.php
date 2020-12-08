<input type="submit" name="del" value="Delete"/><hr/>
<h1>Draft</h1><hr/>
<?php
$user=$_SESSION['user'];
$od=opendir("User_Data/$user/draft");
while($f=readdir($od))
	{
     if($f!="." && $f!="..")
	 {
	 echo "<form method='post'>";
	 echo "<input type='checkbox' name='chk[]' value='$f'>";
	 echo "<a href='home.php?condrft=$f'>$f</a><hr/>";
	 }
	}
?>
</form>
<?php
if(isset($_POST['del']))
{
   $cb=$_POST['chk'];
	foreach($cb as $v)
	{
	copy("User_Data/$user/inbox/$v","User_Data/$user/trash/$v");
	unlink("User_Data/$user/draft/$v");
	}
}
?>