<?php
	function alert($message)
	{
		echo "<script> alert('$message') </script>";
	}

	function redirect($url)
	{
		echo "<script> document.location = '$url' </script>";
	}
?>