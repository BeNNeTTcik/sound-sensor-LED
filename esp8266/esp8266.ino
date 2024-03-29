#include <ESP8266WiFi.h>
#include <SPI.h>
#include <ESP8266HTTPClient.h>

#define HOST "localhost"              //server variables
#define WIFI_SSID "{WiFi_name}"
#define WIFI_PASSWORD "{password_to_WiFi}"
#define LED 15                        //pin from GPIO15 to LED
const int soundSensorPin = A0;        //pin sensor
String sound_data, postData, local="pokoj";   //location

void setup_wifi() {                 //connect to WiFI function

  delay(10);
  Serial.begin(115200);                          //set speed when esp8266 is connected with PC 
  Serial.println();
  Serial.print("Connection to: ");              //serial monitor print this
  Serial.println(WIFI_SSID);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);                    //login WiFi

  while (WiFi.status() != WL_CONNECTED) {

    delay(500);
    Serial.print(".");

  }

  Serial.println("");
  Serial.println("WiFi conected and address is: ");
  Serial.println(WiFi.localIP());                       //print IP

}

void setup() {                                //use WiFi function and set diode on 0

    Serial.begin(115200);

    WiFi.mode(WIFI_STA);                  
    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
    setup_wifi();                         //use WiFi function

    pinMode(LED,OUTPUT);                  //set diode on 0
    digitalWrite(LED,LOW);

}

void loop() {

    WiFiClient client;                //will define the WiFi client and HTTP client
    HTTPClient http;

    int soundValue = analogRead(soundSensorPin);      //read data from sensor
    sound_data = String(soundValue);                  //change to String (needed to send via HTTP POST)

    postData = "sound=" + sound_data +"&local=" + local;    //data which will be send via HTTp POST metod
    Serial.print("Sending: ");                              //serial monitor print this
    Serial.println(postData);

    Serial.println("Sending data to server: ");
    http.begin(client, "http://{SERVER_IP}/sound/sound.php");     //uses script to add data to db 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //set HTTP type of data 
    
    int httpCode = http.POST(postData);       //answear server on sended data
    http.end();         //close connection HTTP client

//-------------------------------------------------------------------------------------------

    HTTPClient http2;                 //will define the WiFi client and HTTP client
    String LED_Data;                  //variables
    int id = 0;                       //id LED

    LED_Data = "id_led=" + String(id);    //data which will be send via HTTp POST metod

    Serial.println("Get data from server: ");    
    http2.begin(client, "http://{SERVER_IP}/sound/get.php");                  //uses script to add data to db 
    http2.addHeader("Content-Type", "application/x-www-form-urlencoded");     //set HTTP type of data 

    int httpCodeGet = http2.POST(LED_Data);     //answear server on query
    String get_data = http2.getString();        //chenge string on int 
    Serial.println(get_data);                   //value of led

    if (get_data == "1") {        //if 1 = turn on LED
    digitalWrite(LED, HIGH);      
    }
    if (get_data == "0") {        //if 0 = turn off LED
    digitalWrite(LED, LOW);       
    }

    http2.end();          //close connection HTTP client

    delay(5000);
}
