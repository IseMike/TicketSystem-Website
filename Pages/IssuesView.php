<?php 
	include "dbConnector.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel = "stylesheet" type = "text/css" href="/Pages/StyleSheet.css">
 	<title>Issues</title>
 	<h1>
 		Issues Table
 	</h1>
 </head>
 <body>
 		<form action='/Pages/UpdateDatabase.php' method='post' accept-charset=utf-8>
 			<?php
				$msg = $_GET['msg'] ?? '';
				if (!empty($msg))
				{
					echo "<script type='text/javascript'>alert('$msg');</script>";
				}
			?>
		</form>
 	<?php 
 		$query = mysqli_query($connector, "SELECT * FROM issues");
 	?>
 	<div id="resp-table">
 		<div id="resp-table-header">
 	 			<div class="table-header-cell">Name</div>
	 	 		<div class="table-header-cell">Subject</div>
	 	 		<div class="table-header-cell">Description</div>
	 	 		<div class="table-header-cell">UrgencyLevel</div>
	 	 		<div class="table-header-cell">AssignedTech</div>
	 	 		<div class="table-header-cell">IssueID</div>
	 	 	</div>
	 	<div id="resp-table-body">
 	 	<?php
	 	 	while ($row = mysqli_fetch_assoc($query))
	 	 	{
	 	 		echo
	 	 		"
		 	 	<form class='resp-table-row' method='post' action='UpdateDatabase.php'>
		 	 		<div class='table-body-cell'>{$row['Name']}</div>
		 	 		<div class='table-body-cell'>{$row['Subject']}</div>
		 	 		<div class='table-body-cell'>{$row['Description']}</div>
		 	 		<div class='table-body-cell'><input type='text' id='eLevel' name='eLevel' value={$row['UrgencyLevel']}></div>
		 	 		<div class='table-body-cell'><select name='eTech' id='eTech'>";

		 	 		$techs = mysqli_query($connector, "SELECT EmployeeName FROM employees WHERE Tech=1");
		 	 		// If there is no assigned tech set the default to unassigned
 	 				if(empty($row['AssignedTech']))
 	 				{
 	 					echo "<option value=Unassigned selected>Unassigned</option>";
 	 				}
 	 				else
 	 				{
	 	 				echo "<option value=Unassigned>Unassigned</option>"; 
	 	 			}
		 	 		// Dropdown bar for techs
	 	 			while ($techRow = mysqli_fetch_assoc($techs)) {
	 	 				// If there is already an assigned tech
	 	 				printf("This is the Assigned Tech - %s\n", $row['AssignedTech']);
	 	 				printf("This is the Current Employee - %s\n", $techRow['EmployeeName']);
	 	 				if(!empty($row['AssignedTech']))
	 	 				{
	 	 					// If the assigned tech is not the current selected tech in the list of techs
	 	 					if(strcmp($row['AssignedTech'], $techRow['EmployeeName']) != 0)
	 	 					{
	 	 						echo "<option value={$techRow['EmployeeName']}>{$techRow['EmployeeName']}</option>";
	 	 					}
	 	 					// If the assigned tech is the current selected tech in the list of techs
	 	 					else
	 	 					{
	 	 						printf($techRow['EmployeeName']);
	 	 						echo "<option value={$techRow['EmployeeName']} selected>{$techRow['EmployeeName']}</option>";
	 	 					}
	 	 				}
	 	 				// If there is not already an assigned tech
	 	 				else
	 	 				{
	 	 					echo 
	 	 					"<option value={$techRow['EmployeeName']}>{$techRow['EmployeeName']}</option>";
	 	 				}
	 	 			}
	 	 			echo "</select></div>";
		 	 	echo
 	 			"
 	 			<div class='table-body-cell'><input type='text' id='eID' name='eID' value={$row['IssueID']} readonly></div>
 	 			<div class='table-body-cell'><input type='submit' value='Update'></div>
 	 			</form>
 	 			";
	 	 	}	 	
 	 	?>
 	</div>
 	</div>
	<form method = 'post'>
		<input type='submit' formaction='AdminPage.html' value='Home' style='height:50px; width:250px; margin-left: 41%; margin-top: 100px;'/>
	</form>
 </body>
 </html>