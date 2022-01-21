<?php 
	include "dbConnector.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Employees</title>
 	<style>
 		table, tr, td {
 			border: 1px solid black;
 		}
 	</style>
 	<h1>
 		Employee Table
 	</h1>
 </head>
 <body>
 	<?php 
 		$query = mysqli_query($connector, "SELECT * FROM employees");
 		//printf("SELECT returned %d rows. \n", mysqli_num_rows($query));
 	 ?>
 	 <table>
 	 	<thead>
 	 		<tr>
 	 			<th>Employee ID</th>
 	 			<th>Employee Name</th>
 	 			<th>Admin?</th>
 	 			<th>Tech?</th>
 	 		</tr>
 	 	</thead>
 	 	<tbody>
 	 		<?php 
 	 		while ($row = mysqli_fetch_assoc($query)) {
 	 			echo 
 	 			"<tr>
 	 			<td>{$row['EmployeeID']}</td>
 	 			<td>{$row['EmployeeName']}</td>
 	 			<td>{$row['Admin']}</td>
 	 			<td>{$row['Tech']}</td>
 	 			</tr>
 	 			";
 	 		}
 	 		 ?>
 	 	</tbody>
 	 </table>
 </body>
 </html>
 <?php mysqli_close($connector) ?>