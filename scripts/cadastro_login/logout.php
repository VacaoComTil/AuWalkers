<?php
	include_once("../utils.php");

	session_start();
	session_destroy();
	
	redirect("../../");
?>