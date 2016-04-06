<?php
	
	//#######################
	//# DATABASE CONNECTION #
	//#######################
	
	$CONNECTION_HOST = "localhost";
	$CONNECTION_USER = "root";
	$CONNECTION_PASSWORD = "CPSC471!";
	$CONNECTION_DATABASE = "final_project";
	
	$link = mysqli_connect($CONNECTION_HOST, $CONNECTION_USER, $CONNECTION_PASSWORD, $CONNECTION_DATABASE);
	if (!$link)
	{
		echo mysqli_connect_error();
	}
	
	//######################
	//# DATABASE FUNCTIONS #
	//######################
	
	//Returns an array that contains all the users with their names and ids
	function getCustomers()
	{
		//The array that will be populated with the data
		$array = array();
		
		//Create the SQL statement
		$SQL = "SELECT * FROM customer";
		
		//Execute the SQL statement
		global $link;
		$results = mysqli_query($link, $SQL);
         
		//Retrieve the rows returned
		while ($row = mysqli_fetch_row($results))
		{
			//Each customerObject represents one user
			$customerObject = array(); //This array will be used as a dictionary (key, value)
			$customerObject["customerId"] = $row[0];	//(key, value) => (id => $row[0])
			$customerObject["fName"] = $row[1];
            $customerObject["lName"] = $row[2];
            $customerObject["address"] = $row[3];
            $customerObject["phoneNumber"] = $row[4];
            $customerObject["country"] = $row[5];
            $customerObject["customerUsername"] = $row[6];
            $customerObject["customerPassword"] = $row[7];
            $customerObject["emailAddress"] = $row[8];
            
			
			$array[] = $customerObject; //Add the user information to the array that will be returned to the user
									//$array[] = ... => similar to array.push or array.add in other languages
		}
		return $array;
	}
    
    function addCustomer(){
        
    }
	
	
?>