<?php         
  $hostname = "localhost";      //server variables
  $username = "root"; 
  $password = ""; 
  $database = "sensor"; 
  
  $conn = mysqli_connect($hostname, $username, $password, $database);   //data to connect with db
  
  if (!$conn) {     //connection status

      die("Error: " . mysqli_connect_error()); 

  } else {

  if (!empty($_POST)) {                   //if is not empty data
    
	  $id_led=$_POST["id_led"];                                 //get data from HTTP POST packet
    $sql = "SELECT * FROM led WHERE id_led='$id_led'";        //query to the database
	  $res = mysqli_query($conn, $sql);                         //used query and connection to get data from db 

	  while($date=mysqli_fetch_array($res)) {       
	
		echo $date = $date["stat"];     //send date in HTTP POST 
    } 
  } 
  }
  
  $conn->close();                   //close connection
?>