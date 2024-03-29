<!DOCTYPE html>    
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> LED </title>
</head>
<body>
  <div class="topnav">                              <!-- menu -->
        <a href="index.php">Sensor</a>              <!-- secound webpage to see a values of sound sensor --> 
        <a class="active" href="LED.php">LED</a>    <!-- used webpage -->
  </div>
  </div class="main">                               
    <h1 class="title">Turn OFF Turn ON</h1>
    
    <form action="update.php" method="post" id="LED_ON" onsubmit="myFunction()">       <!-- action after click --> 
      <input type="hidden" name="stat" value="1"/>    
    </form>
    
    <form action="update.php" method="post" id="LED_OFF">                              <!-- action after click --> 
      <input type="hidden" name="stat" value="0"/>
    </form>
    
    <button class="buttonON" name= "subject" type="submit" form="LED_ON" value="SubmitLEDON" >LED ON</button>        <!-- button --> 
    <button class="buttonOFF" name= "subject" type="submit" form="LED_OFF" value="SubmitLEDOFF">LED OFF</button>     <!-- button --> 
  </div>  
</body>
</html>

