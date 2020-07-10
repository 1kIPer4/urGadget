<?php
	//Выход из учётной записи
	session_start();
	unset($_SESSION['logged_user']);
	header("Location: ".$_SERVER["HTTP_REFERER"]);
?>