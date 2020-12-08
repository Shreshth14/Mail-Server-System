<?php 
$od=opendir("theme");
while($f=readdir($od))
{
	if($f!="." && $f!="..")
	{
	echo "<a href='home.php?thm=$f'><img src=theme/$f width='100' border='2px'/>&nbsp;&nbsp;</a>";
	}
}
?>