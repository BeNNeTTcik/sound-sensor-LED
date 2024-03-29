<!DOCTYPE html>     
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title> LED </title>
</head>
<body>
    <div class="topnav">                        <!-- menu -->
        <a href="index.php">Sensor</a>          <!-- used webpage -->
        <a href="LED.php">LED</a>               <!-- secound webpage to control LED -->
    </div>

<?php     
  $hostname = "localhost";                      //server variables
  $username = "root"; 
  $password = ""; 
  $database = "sensor"; 
  
  $conn = mysqli_connect($hostname, $username, $password, $database);           //data to connect with db
  
  if (!$conn)                        //connection status
  { 
      die("Error: " . mysqli_connect_error()); 
  } else {
      echo "<div class='main'>Connection OK</div>"; 
  }
  
  if (!empty($_POST)) {                     //if is not empty data
    $stat = $_POST["stat"];                 //get data from HTTP POST packet
                                                                
    $sql = "UPDATE led SET stat='$stat' WHERE id_led = 0";          //change stat in db
    if(mysqli_query($conn, $sql)) {
        echo "<div class='main'>Changed value</div>";
        
    } else {
        echo "ERROR: $sql. "
            . mysqli_error($conn);
    }
   
  } 
  $conn->close();                       //close connection
?>

</body>
</html>