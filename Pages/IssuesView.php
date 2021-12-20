<?php 
	$username = "root";
	$password = "";
	$host = "localhost";

	$connector = mysqli_connect($host, $username, $password, "ticket")
		or die("Unable to connect to my sql.");

	//$selected = mysqli_select_db("ticket", $connector)
	//	or die("Unable to connect to ticket database.");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Issues</title>
 	<style>
 		table, tr, td {
 			border: 1px solid black;
 		}
 	</style>
 	<h1>
 		Issues Table
 	</h1>
 </head>
 <body>
 	<?php 
 		$query = mysqli_query($connector, "SELECT * FROM issues");
 		//printf("SELECT returned %d rows. \n", mysqli_num_rows($query));
 	 ?>
 	 <table>
 	 	<thead>
 	 		<tr>
 	 			<th>Name</th>
 	 			<th>Subject</th>
 	 			<th>Description</th>
 	 			<th>UrgencyLevel</th>
 	 			<th>AssignedTech</th>
 	 			<th>IssueID</th>
 	 		</tr>
 	 	</thead>
 	 	<tbody>
 	 		<?php 
 	 		while ($row = mysqli_fetch_assoc($query)) {
 	 			echo 
 	 			"<tr>
 	 			<td>{$row['Name']}</td>
 	 			<td>{$row['Subject']}</td>
 	 			<td>{$row['Description']}</td>
 	 			<td>{$row['UrgencyLevel']}</td>
 	 			<td>{$row['AssignedTech']}</td>
 	 			<td>{$row['IssueID']}</td>
 	 			</tr>
 	 			";
 	 		}
 	 		 ?>
 	 	</tbody>
 	 </table>
 </body>
 </html>
 <?php mysqli_close($connector) ?>