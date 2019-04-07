#define ECHOPIN 13 //3
#define TRIGPIN 12  //2 USE 
#define LED 11
#define LED2 10
void setup() {
  // put your setup code here, to run once:
   Serial.begin(9600);
   pinMode(ECHOPIN,INPUT);
   pinMode(TRIGPIN, OUTPUT);
   pinMode(LED , OUTPUT);
   pinMode(LED2, OUTPUT);
}

void loop() 
{
  // put your main code here, to run repeatedly:
   digitalWrite(TRIGPIN,LOW);
   delayMicroseconds(20);
   digitalWrite(TRIGPIN, HIGH);
   delayMicroseconds(10);
   digitalWrite(TRIGPIN,LOW);
   //digitalWrite(LED, HIGH);
   //distance
   float distance =pulseIn(ECHOPIN, HIGH);
   Serial.println(distance);
   distance=distance/58;
   if (distance == 0)
   {
    digitalWrite(LED2,HIGH);
    digitalWrite(LED, LOW);
    Serial.println("device is hacked");
   }
   else if (distance <5)
   {
    digitalWrite(LED2,LOW);
    digitalWrite(LED, HIGH);
    Serial.println("bucket is full");
   }
   else
   {
    digitalWrite(LED2,LOW);
    digitalWrite(LED, LOW);
   Serial.print(distance);
   Serial.println("cm");
   }
   delay(1000);
}
