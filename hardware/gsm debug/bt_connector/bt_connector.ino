#include <SoftwareSerial.h>
SoftwareSerial BSerial(9, 10); //for hc-05 pin RX=11 | TX=10

/* 
 *  sim900a
 *  AT+SAPBR=3,1,"Contype","GPRS"
 *  AT+SAPBR=3,1,"APN","internet" //"blweb" //for banglalink
 *  AT+SAPBR =1,1
 *  AT+HTTPINIT
 *  AT+HTTPPARA="CID",1
 *  
 *  
 * 
 *  AT+HTTPPARA="URL","http://waste.dgted.com/process.php?binid=1104&longitude=23&lattitude=87&value=200&temperature=50"
 *  AT+HTTPPARA="URL","http://waste.dgted.com/processgpsdata.php?binid=1231&longitude=67&lattitude=56&value=33&temperature=23"
 *  AT+HTTPPARA="URL","http://waste.dgted.com/process.php?binid=1104&longitude=33&lattitude=89&value=78&temperature=200"
 *  AT+HTTPACTION=0
 *  AT+HTTPREAD
 *  
 *  
 *  AT
 *  AT+CUSD=1
 *  AT+CUSD=1,"*778#"
 *  
 *  AT+HTTPPARA="URL","http://we2app.com/test.html"
 *  AT+HTTPPARA="URL","https://ebots.github.io/httptest/"
 *  
 *  
 *  Serial.print("AT+CSCA=\"+919032055002\"\r");
 */
void setup() {
   
    Serial.begin(9600);
  //  BSerial.begin(38400); 
    BSerial.begin(9600); 

    delay(5000);



BSerial.print("AT+SAPBR=3,1,\"Contype\",\"GPRS\"\r\n");
delay(200);
BSerial.print("AT+SAPBR=3,1,\"APN\",\"blweb\"\r\n");
delay(100);

BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);

BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);

BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);

BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);

BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);
BSerial.print("AT\r\n");
delay(500);


    
}

void loop() {
  if (BSerial.available())

Serial.print(BSerial.readString());

if (Serial.available())

BSerial.print(Serial.readString());





}

