#include <TinyGPS.h>
#include <SoftwareSerial.h>
SoftwareSerial Gsm(7, 8);
 
TinyGPS gps;  //Creates a new instance of the TinyGPS object
 
void setup()
{
  Serial.begin(9600);
  Gsm.begin(9600);  
 
}
 
void loop()
{
  bool newData = false;
  unsigned long chars;
  unsigned short sentences, failed;
 
  // For one second we parse GPS data and report some key values
  for (unsigned long start = millis(); millis() - start < 1000;)
  {
    while (Serial.available())
    {
      char c = Serial.read();
      Serial.print(c);
      if (gps.encode(c)) 
        newData = true;  
    }
  }
 
  if (newData)      //If newData is true
  {
    float flat, flon;
    unsigned long age;
    gps.f_get_position(&flat, &flon, &age);   
    Gsm.print("AT+CMGF=1\r"); 
    delay(400);
    
    delay(300);
    Gsm.print("AT+HTTPPARA=\"URL\",\"file:///D:/materi%20kampus/TA/program/geofencing-old/demo/index1.html");
    Gsm.print(random(0,100));
    delay(2000);
    ShowSerialData();  
    
   // Gsm.print("Latitude = ");
    Gsm.print(flat == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flat, 6);
    //Gsm.print(" Longitude = ");
    Serial.print(",");
    Gsm.print(flon == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flon, 6);
    delay(200);
    Gsm.println((char)26); // End AT command with a ^Z, ASCII code 26
    delay(200);
    Gsm.println();
    delay(20000);
 
  }
 
  Serial.println(failed);
 // if (chars == 0)
   // Serial.println("** No characters received from GPS: check wiring **");
}

void ShowSerialData()
{
  while(Gsm.available()!=0)
    Serial.write(char (Gsm.read()));
}
