<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		echo($_POST['id']);
		echo($_POST['prof']);
		echo($_POST['speed']);
		echo($_POST['time']);
	}
?>