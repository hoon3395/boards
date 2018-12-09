<?php

	require_once("tools.php");

	session_start();

	unset($_SESSION["uid"]);
	unset($_SESSION["name"]);

	goNow(MAIN_PAGE);



?>