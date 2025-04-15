<?php
include "connection.php";
if($connection)
{
echo "Appointment Successful";
}
else{
echo "Error:".mysqli_error($connection);
}

$name=$_POST['uname'];
$mail=$_POST['email'];
$number=$_POST['number'];
$date=$_POST['date'];
$time=$_POST['timing'];
$umessage=$_POST['message'];
$query="CREATE TABLE appointment(username VARCHAR(30) NOT NULL,email VARCHAR(50),number VARCHAR(50),date VARCHAR(50),timing VARCHAR(30),message VARCHAR(50));";
/*
if(mysqli_query($connection,$query))
{
echo "table created";
}
else{
echo "Error:".mysqli_error($connection)."<br>";
}



*/

$query="INSERT INTO appointment VALUES('$name','$mail','$number','$date','$time','$umessage');";
if(mysqli_query($connection,$query))
{
	echo " values inserted";
}
else
{
	echo "Error:".mysqli_error($connection);
}


mysqli_close($connection);
?>
<a href="appointment.html" class="link-btn"><button>OK</button></a>



