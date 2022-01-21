<?php 
	include "dbConnector.php";
	include "MakeSafe.php";

	$tech = $_POST["eTech"] ?? '';
	$urgency = $_POST['eLevel'] ?? '';
	$id = $_POST['eID'] ?? '';

	makeSafe($tech);
	makeSafe($urgency);
	makeSafe($id);

	if (isset($id) && isset($tech) && isset($urgency))
	{
		printf("True");
		printf($urgency);
		printf($id);
		printf($tech);
		updateRow($tech, $urgency, $id);
		$Message = urlencode("$tech has been set for issue with Issue ID: $id and Urgency Level: $urgency");
	}
	else
	{
		printf("False");
		$Message = urlencode("ERROR Something has gone wrong here are the inputs: '$tech' '$id' '$urgency'");
	}

	header("Location: IssuesView.php?msg=".$Message);

	// Given information updates a row and refreshes the page to display the change.
	function updateRow($Tech, $Urgency, $ID)
	{
		global $connector;
		$update = mysqli_query($connector, "UPDATE issues SET UrgencyLevel='$Urgency', AssignedTech='$Tech' WHERE IssueID='$ID'");
		printf($update);
	}

 ?>