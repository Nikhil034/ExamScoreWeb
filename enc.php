<?php

	$str='hello';
	echo "<br>".$str;
 
    $str2="hello";

	if(md5($str2)==md5($str))
	{
		echo "password are match";
	}
	else
	{
		echo "password are not match";
	}

?>