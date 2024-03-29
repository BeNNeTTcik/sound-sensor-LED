### sound-sensor-LED
Sound Sensor and LED connected with db (phpmyadmin) via XAMPP. Sound sensor sends data to db. LED is control by db. I used PHP scripts like [get.php](./get.php), [update.php](./update.php), [sound.php](./sound.php) and preaper webpage [index.php](./index.php), [LED.php](./LED.php) with [style.css](./style.css). Core board is ESP8266, which is connected with local WiFi to communicate with local server on PC (XAMPP). Data is sended via HTTP POST method.

####1. XAMPP download: ####
*[XAMPP](https://www.apachefriends.org/pl/index.html)*

####2. Start XAMPP:####
![image](https://github.com/BeNNeTTcik/sound-sensor-LED/assets/42866234/e98acf87-f9cf-4a61-a265-46753acf8a30)

####4. Login to PHPMyAdmin:####
Copy this ```http://localhost/phpmyadmin/index.php``` URL to enter the PHPMyAdmin.

####5. Create db:####
Press "New" on the left bar and write name of db, then use metod of db: utf8mb4_general_ci. Press "Create".

####6. New table:####
Press "New" when u click on created db. Then Create new table. Write name and write 4 in number of collumns. After that press "Create". 

####7. Structure for sound sensor:####
![image](https://github.com/BeNNeTTcik/sound-sensor-LED/assets/42866234/2ae34207-f6b4-4b70-92e8-f928f1313721)

####8. New table:####
Press "New" when u click on created db. Then Create new table. Write name and write 2 in number number of collumns. After that press "Create". 

####9. Structure for LED:####
![image](https://github.com/BeNNeTTcik/sound-sensor-LED/assets/42866234/8376b60b-7176-4558-a8dc-fdbc2c906b40)

####10. I use Aruduino APP to code ESP8266:#### [esp8266.ino](./esp8266/esp8266.ino)

####11. Sound sensor script#### -> [sound.php](./sound.php) - add data to db.

####12. LED scripts#### -> [get.php](./get.php) - get status of LED from db
                        -> [update.php](./update.php) - after change status update it in db.
