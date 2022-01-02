<?php
	$username = "root";
	$password = "";
	$host = "localhost";

	global $connector;
	$connector = mysqli_connect($host, $username, $password, "ticket")
		or die("Unable to connect to my sql.");

	$Name = $_GET["Ename"] ?? '';
	$Subject = $_GET["Esubject"] ?? '';
	$Desc = $_GET["Edesc"] ?? '';

	$Name = makeSafe($Name);
	$Subject = makeSafe($Subject);
	$Desc = makeSafe($Desc);

	$query = "SELECT MAX(IssueID) FROM issues";
	$Result = mysqli_query($connector, $query);
	$Max = ($Result->fetch_array()[0] ?? '') +1;
	$query ="INSERT INTO issues (Name, Subject, Description, UrgencyLevel, AssignedTech, IssueID) VALUES ('$Name', '$Subject', '$Desc', 0, '', $Max)";
	$Result = mysqli_query($connector, $query);

	echo $Result;
	if($Result)
	{
		echo "New Record Inserted";
	}
	else
	{
		echo "<br> Error: " .$query ."<br>";
	}

	$query = "SELECT * FROM issues";
	$Result = mysqli_query($connector, $query);


	function makeSafe($Text)
	{
		$Text = trim($Text);
		$Text = stripcslashes($Text);
		$Text = htmlspecialchars($Text);
		return $Text;
	}


	$connector->close();
?>


<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Submitting...</title>
 </head>
 </html>