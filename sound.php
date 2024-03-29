<?php           //script PHP 

$hostname = "localhost";        //server variables
$username = "root"; 
$password = ""; 
$database = "sensor"; 

$conn = mysqli_connect($hostname, $username, $password, $database);     //data to connect with db

if (!$conn) {                                               //connection status

	die("Error: " . mysqli_connect_error()); 	            //if not connected, display the error value

} else {

    echo "connected with DB";     	                        //connected with db  
     
}

$sound = $_POST["sound"];               //get data from HTTP POST packet
$local = $_POST["local"];               //get data from HTTP POST packet
$sound2 = (int)$sound;                  //converting a string into an int variable

$sql = "INSERT INTO sound (miejsce, sound) VALUES ('$local','$sound2')";            //query to the database

if(mysqli_query($conn, $sql)) {             //used query and connection to add data into db
    echo "Data added to DB.";
    
} else {        		                    //display an error when adding is not possible
    echo "ERROR: $sql. "
        . mysqli_error($conn);
}

$conn->close();			                    //close connection
?>  