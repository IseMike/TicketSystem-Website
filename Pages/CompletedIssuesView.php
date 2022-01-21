<?php 
	include "dbConnector.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Completed Issues</title>
 	<style>
 		table, tr, td {
 			border: 1px solid black;
 		}
 	</style>
 	<h1>
 		Completed Issues Table
 	</h1>
 </head>
 <body>
 	<?php 
 		$query = mysqli_query($connector, "SELECT * FROM completedissues");
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
       <form method = 'post'>
              <input type='submit' onclick="history.go(-1)" value='Home' style='height:50px; width:250px; margin-left: 41%; margin-top: 100px;'/>
       </form>
 </body>
 </html>
 <?php mysqli_close($connector) ?>