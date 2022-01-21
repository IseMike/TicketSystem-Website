<?php
	include "dbConnector.php";
	session_start();
	$id = $_SESSION['eID'];	
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
 	<?php 
 		$query = mysqli_query($connector, "SELECT issues.Name, issues.Subject, issues.Description, issues.UrgencyLevel, issues.IssueID 
 											FROM issues INNER JOIN employees ON issues.AssignedTech = employees.EmployeeName WHERE employees.EmployeeID = $id
 											ORDER BY issues.UrgencyLevel ASC");
 	?>
 	<div id="resp-table">
 		<div id="resp-table-header">
 	 			<div class="table-header-cell">Name</div>
	 	 		<div class="table-header-cell">Subject</div>
	 	 		<div class="table-header-cell">Description</div>
	 	 		<div class="table-header-cell">UrgencyLevel</div>
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
		 	 		<div class='table-body-cell-desc'>{$row['Description']}</div>
		 	 		<div class='table-body-cell'>{$row['UrgencyLevel']}</div>
	 	 			<div class='table-body-cell'><input type='text' id='iID' name='iID' value={$row['IssueID']} readonly></div>
 	 			</form>
 	 			";
	 	 	}	 	
 	 	?>
 	</div>
 	</div>
	<form method = 'post'>
		<input type='submit' formaction='TechPage.html' value='Home' style='height:50px; width:250px; margin-left: 41%; margin-top: 100px;'/>
	</form>
 </body>