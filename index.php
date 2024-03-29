<!DOCTYPE html>         
<html lang="pl">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>   <!-- script to create a chart -->
<div id="container"></div>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">			
    <title> Sensor </title>
</head>
<body>
    <div class="topnav">        				            <!-- menu -->
        <a class="active" href="index.php">Sensor</a>		<!-- used webpage -->
        <a href="LED.php">LED</a>				            <!-- secound webpage to control LED -->
    </div>

    <div class="main">
        <h1 class="title">Chart</h1>
        
        <canvas id="myChart"></canvas>
       
        <?php
                $hostname = "localhost";        	//server variables
                $username = "root"; 
                $password = ""; 
                $database = "sensor"; 
                
                $conn = mysqli_connect($hostname, $username, $password, $database);         //data to connect with db
                
                if (!$conn)         //connection status
                { 
                    die("Error: " . mysqli_connect_error()); 			//if not connected, display the error value
                
                } else {

                    $sql2 = "SELECT * FROM sound";          		//query to the database
                    $res = mysqli_query($conn, $sql2);        	    //used query and connection to get data from db

                    foreach($res as $data) {      			        //data recording like a table
                        $json1[] = $data["sound"];
                        $json2[] = $data["data"];
                    }
                    
                    
                }
                $conn->close();						//close connection
                ?> 
     
                <script>        					//chart
                    const labels = <?php echo json_encode($json2) ?>;	//uses data from the top php query {date}
                    const data = {
                    labels: labels,
                    datasets: [{
                    label: 'Sound value',
                    data: <?php echo json_encode($json1) ?>,		//uses data from the top php query {sound}
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                 }]
                };
                const config = {
                    type: 'line',
                    data: data,
                };
                var myChart = new Chart(document.getElementById('myChart'), config);
                </script>


        <h1 class="title"> Table with sound values </h1>     	<!-- table with data from db -->

        <table class="table">
            <thead class="param">
                <tr>
                    <th scope="col">id</th>		                <!-- id column -->
                    <th scope="col">local</th>	                <!-- local column -->
                    <th scope="col">sound</th>		            <!-- sound column -->
                    <th scope="col">date and time</th>	           <!-- date column -->
                </tr>
            </thead>
            <tbody>
                <?php       
                $hostname = "localhost";        	        //server variables
                $username = "root"; 
                $password = ""; 
                $database = "sensor"; 
                
                $conn = mysqli_connect($hostname, $username, $password, $database);     //data to connect with db
                
                if (!$conn) {      							    //connection status 
                    
                    die("Connection failed: " . mysqli_connect_error()); 
                
                } else {

                    $sql = "SELECT * FROM sound";
                    $res = mysqli_query($conn, $sql);

                    while($row=mysqli_fetch_array($res)) {       	//used query and connection to get data from db

                        $id = $row["id"];           		  	    //connect variables with data from db 
                        $local = $row["local"];
                        $sound = $row["sound"];
                        $date = $row["date"];
                                                			        //write data from db into table on html webpage
                        echo "<tr>          
                        <th scope='row'>$id</th>
                        <td>$miejsce</td>
                        <td>$sound</td>
                        <td>$date</td>
                        </tr>";
                    }
                }
                $conn->close();						                //close connection
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>