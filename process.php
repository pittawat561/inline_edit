<?php

//process.php

include 'conn.php';

if(isset($_POST["pk"]))
{
	$query = "
	UPDATE tbl_sample 
	SET ".$_POST['name']." = '".$_POST["value"]."' 
	WHERE id = '".$_POST["pk"]."'
	";

	$conn->query($query);

	echo 'Update Success';
}

?>