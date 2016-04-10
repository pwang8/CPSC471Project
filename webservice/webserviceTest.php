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
	else if ($method == "addCustomer") 		// webservice.php?method=addUser&name=person
    {
        echo "1";
        json_addCustomer($_GET['fn'], $_GET['ln'], $_GET['add'], $_GET['phno'],  $_GET['ctry'], $_GET['usrn'], $_GET['pw'],  $_GET['email']);
    }
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
	
    function json_addCustomer($fn, $ln, $add, $phno, $ctry, $usrn, $pw, $email)
    {
        echo "<script>alert('asdfsdf');</script>";
        $valid = true;
        $message = "Customer added successfully";
        
        if (!isset($fn)){
            $valid = false;
            $message = "Please make sure to pass the name to the webservice"; 
        }
        
        //Adds the user using the library method
		if ($valid)
		{
			$valid = addCustomer($fn, $ln, $add, $phno, $ctry, $usrn, $pw, $email);
			if (!$valid)
				$message = "Something went wrong with the insertion process";
		}
        
        $output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
    }    
    
	//Deletes a user using the delete function in the library
	//Then it returns the result in JSON format
	/*
	{
		"success" : true,
		"message" : "User deleted successfully"
	}
	*/
	function json_deleteCustomer($id)
	{
		$valid = true;
		$message = "User deleted successfully";
		
		//Check if the id was inserted in the URL request (webservice.php?method=deleteUser&id=????)
		if (!isset($id))
		{
			$valid = false;
			$message = "ID is not found in database.";
		}
		
		//Deletes the user using the library method
		if ($valid)
		{
			$valid = deleteUser($id);
			if (!$valid)
				$message = "Something went wrong with the deletion process";
		}
		
		$output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
	}
	
?>
