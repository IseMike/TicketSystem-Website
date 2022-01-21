<?php
	include "dbConnector.php";

	function getID()
	{
		$id = $_POST["Eid"] ?? '';

		$id = trim($id);
		$id = stripslashes($id);
		$id = htmlspecialchars($id);

		$type = -1;
		$check = checkForEmployee($id);

		// Is an Employee
		if ($check == TRUE)
		{
			$type = checkForType($id);
		}
		else
		{
			$Message = urlencode("Username Not Recognized. Please try Again.");
			header("Location: ErrorPage.php?msg=".$Message);
		}
		// Normal Employee
		if($type == 0)
		{
			printf("Employee");
			header("Location: EmployeePage.html");
		}
		// Admin
		if($type == 1)
		{
			printf("Admin");
			header("Location: AdminPage.html");
		}
		//Tech
		if($type == 2)
		{
			printf("Tech");
			session_start();
			$_SESSION['eID'] = $id;
			header("Location: TechPage.html");
		}
	}


	function checkForEmployee($Eid){
		global $connector;
		$query ="SELECT * FROM employees WHERE EmployeeID = {$Eid}";
		$result = mysqli_query($connector, $query);
		if(mysqli_num_rows($result))
		{
			printf("TRUE");
			return TRUE;
		}
		else
		{
			printf("FALSE");
			return FALSE;
		} 
	}

	function checkForType($Eid)
	{
		global $connector;
		$query = "SELECT Admin FROM employees WHERE EmployeeID = {$Eid} AND Admin = 1";
		$result = mysqli_query($connector, $query);
		if(mysqli_num_rows($result))
		{
			return 1;
		}

		$query = "SELECT Tech FROM employees WHERE EmployeeID = {$Eid} AND Tech = 1";
		$result = mysqli_query($connector, $query);
		if(mysqli_num_rows($result))
		{
			return 2;
		}
		else
		{
			return 0;
		}
	}
	getID();
	$connector->close();
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Redirecting...</title>
 </head>
 </html>