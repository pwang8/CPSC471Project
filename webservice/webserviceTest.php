<?php
	
	//###########
	//# INCLUDE #
	//###########
	
	include("libraryTest.php"); //Includes the library that will return the data or execute the required commands

	//###########
	//# REQUEST #
	//###########
	
	//Check the method requested and execute
	$method = $_GET["method"];
	if ($method == "getCustomers") 			// webservice.php?method=getUsers
		json_getCustomers();
	else if ($method == "addUser") 		// webservice.php?method=addUser&name=person
		json_addUser($_GET["name"]);
	else if ($method == "deleteUser")	// webservice.php?method=deleteUser&id=1
		json_deleteUser($_GET["id"]);
	
	//######################
	//# WEBSERVICE METHODS #
	//######################
	
	//Gets all the user from the method created in the library
	//Then it returns the data in JSON format in the following structure
	/*
	{
		"success" : true,
		"message" : "Users list fetched successfully",
		"data" : [
			{
				"id" : 1,
				"name" : "User 1"
			},
			...
		]
	}	
	*/
	function json_getCustomers()
	{		
		$output = array();
		$output["success"] = true;
		$output["message"] = "Users list fetched successfully";
		$output["data"] = getCustomers(); //Gets the array of users from the library method
		echo json_encode($output); //Prints your dictionary in JSON format
	}
	
	
?>