#include <Arduino.h>
#include <WebServer.h>
#include <WiFiManager.h>
#include <HTTPClient.h>


#define R0  11

//pines esp32 kit
#define MQ9_PIN 35
#define R 17
#define G 5
#define B 18

#define buzz 2
//-------------------------------------------------------------------
float valor=0,sensor,RS, ratio;
int vandera=0;
//float R0;


void enviarDatos(float ratio) {
  if (WiFi.status() == WL_CONNECTED) {
  
    
    HTTPClient http;

    String url = "http://ip/servidorgas/api/insert.php"; //?ratio= + String(ratio);

    http.begin(url);
    http.addHeader("Content-Type","application/json");
    //int httpResponseCode = http.GET();

    String json = "{\"ratio\":"+String(ratio,2)+"}";
    int httpResponseCode= http.POST(json);
    String response = http.getString();
   

    if (httpResponseCode > 0) {
      Serial.print("Respuesta servidor: ");
      Serial.println(httpResponseCode);
    } else {
      Serial.print("Error en envio: ");
      Serial.println(httpResponseCode);
    }

    http.end();
  } else {
    Serial.print("Error en envio :(");
  }
 
}




void setup(){
  //---------------------------------------------
  // RGB declaracion 
  ledcSetup(0, 5000, 8);
  ledcSetup(1, 5000, 8);
  ledcSetup(2, 5000, 8);

  ledcAttachPin(R, 0);
  ledcAttachPin(G, 1);
  ledcAttachPin(B, 2);

  pinMode(buzz,OUTPUT);
//------------------------------------------------------
  Serial.begin(115200);
  delay(1000);
  Serial.println("Inicializando sensor MQ-9...");   
  for(int y=0;y<4;y++){ //pequeño retardo para estabilizar el sensor
        ledcWrite(0, 0);
        ledcWrite(1, 0);
        ledcWrite(2, 255);
        delay(700);
        ledcWrite(0, 0);
        ledcWrite(1, 0);
        ledcWrite(2, 0);
        delay(700);
        }
 
//----------------

  WiFiManager wm;
  
  //wm.resetSettings(); //borra las credenciales guardadas
  wm.setConfigPortalTimeout(180); 

  bool res;
  res = wm.autoConnect("GASmonitor","password"); // contraseña para proteger ap
  
  if(!res) {
        Serial.println("fallo de conexion");
        for(int y=0;y<4;y++){
        ledcWrite(0, 255);
        ledcWrite(1, 0);
        ledcWrite(2, 0);
        delay(500);
        ledcWrite(0, 0);
        ledcWrite(1, 0);
        ledcWrite(2, 0);
        }
        //reinicia el esp para volver a entrar a la red
         ESP.restart();
         
    } 
    
    else {  
        Serial.println("conectado!!");
        ledcWrite(0, 0);
        ledcWrite(1, 255);
        ledcWrite(2, 0);
    }
        
}


void loop(){
  valor=0;
  if(vandera>=1 && ratio>=9 ){
    Serial.println("Enviando datos estables...");
    enviarDatos(ratio);
    vandera=0;
     ledcWrite(0, 0);
    ledcWrite(1, 255);
    ledcWrite(2, 0);
    digitalWrite(buzz,LOW);
  }
  for(int x = 0; x < 100; x++) {
    valor += analogRead(MQ9_PIN);
  }
  valor/= 100.0;
  
  sensor = (valor / 4095.0) * 3.3;

  RS = ((3.3 - sensor) / sensor) * 10; // RL= 10koms  depende del sensor
  ratio = RS / R0; // ratio = RS/R0 
  
  Serial.print("sensor_volt = "); 

  Serial.println(sensor); 
  
  Serial.print("RS_ratio = "); 
  Serial.println(RS); 
  Serial.print("Rs/R0 = "); 
  Serial.println(ratio);
  
  if(ratio<=9 && ratio>=6.1 && vandera==0){
    // naranja
  vandera=1;
  Serial.println("Enviando datos alarma..");
  enviarDatos(ratio);
  ledcWrite(0, 255);
  ledcWrite(1, 165);
  ledcWrite(2, 0);
  for(int x=0;x<3;x++){
    digitalWrite(buzz,HIGH);
    delay(500);
    digitalWrite(buzz,LOW);
    delay(500);
  }
  
  }else if(ratio>=2 && ratio <=6 &&vandera<=1){
 // Rojo
  vandera=2;
  Serial.println("Enviando datos peligro...");
  enviarDatos(ratio);
  ledcWrite(0, 255);
  ledcWrite(1, 0);
  ledcWrite(2, 0);
  digitalWrite(buzz,HIGH);
  }
    // Verde
    //vandera=0;
 
  
  
  
    delay(5000);
}
