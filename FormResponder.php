<?php
	error_reporting(E_ALL);
	require_once("includes/Challenge.php");
	//First thing we want to do is validate our form submission.
	if (isset($_REQUEST['process_token']) && //could be used for complex validation, but if it is their we are happy.
		isset($_REQUEST['challenge']) ) //the challenge we are to perform
	{
		$class = "{$_REQUEST['challenge']}Challenge";
		if(!file_exists("includes/{$class}.php"))
		{
			Challenge::throwError("Failed to load challenge (".$_REQUEST['challenge'].").");
		}
		else
		{
			include_once("includes/{$class}.php");
			$challengeObject = new $class();
			$challengeObject->processInput($_REQUEST['input_data']);
			$challengeObject->PrintJSON();
		}
	}
	else
	{
		Challenge::throwError("Invalid form submission. Please contact support.");
	}
	/*
	 * This is a catch all response... so we don't leave the front end hanging...
	 */
	Challenge::throwError("Wow we have some rogue code here. Please contact support.");
