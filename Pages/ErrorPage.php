<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ticket System</title>
     	<style type="text/css">
        	form {
             		height:400px;
            		width:400px;
             		position: absolute;
					left: 50%;
             		top: 50%;
             		margin: -200px 0 0 -200px;
         	}
         	input.custom{
         		border-color: indianred;	
         	}
     	</style>
</head>
<body>
	<center>
		<h1>Business Name</h1>
		<form action="/Pages/CheckCreds.php" method="post" accept-charset=utf-8>
			<lable>Employee ID:</label> 
			<input type="text" id="Eid" name="Eid" class="custom"/><br><br>
			<input type="submit" value="Continue"/>
			<?php
				$msg = $_GET['msg'];
				echo "<script type='text/javascript'>alert('$msg');</script>";
			?>
		</form>
	</center>
</body>
</html>