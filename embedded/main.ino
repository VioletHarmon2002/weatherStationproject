// Author: Elizaveta Sabanova
// Goal: Read sensor data (temperature, humidity, light) and send/receive to/from backend

#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <NTPClient.h>
#include <WiFiUdp.h>
#include <DHT.h>
#include <ESP8266WiFi.h>  // Include ESP8266WiFi library for WiFi functionality
#include <ArduinoJson.h> //  JSON handling

// define all my pins
#define BUTTON_PIN D4
#define DHT_PIN D5
#define PHOTORESISTOR_PIN A0
#define RED_LED_PIN D7
#define BLUE_LED_PIN D3

// DHT  setup
#define DHT_TYPE DHT11
DHT dht(DHT_PIN, DHT_TYPE);

// LCD setup
LiquidCrystal_I2C lcd(0x27, 16, 2);  // Adjust I2C address if needed

// NTP Client setup
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org", 3600, 60000);

// WiFi connection
const char* ssid = "iotroam";          
const char* password = "F7AlisMod6";  

// Button and display state
bool showTime = false;
bool buttonPressed = false;

// Server URL
const char* serverUrl = "http://145.92.189.122/data_handler.php"; /

void setup() {
  Serial.begin(9600);  // Initialize Serial Monitor
  WiFi.begin(ssid, password);  // Connect to WiFi

  // connection to WiFi
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Trying to connect to WiFi...");
  }
  Serial.println("Connected to WiFi");

  dht.begin();  // Initialize DHT sensor
  lcd.init();       // Initialize the LCD
  lcd.backlight();  // Turn on the LCD backlight

  timeClient.begin();  // Initialize NTP Client
  pinMode(BUTTON_PIN, INPUT_PULLUP);  // Initialize button
  pinMode(RED_LED_PIN, OUTPUT);
  pinMode(BLUE_LED_PIN, OUTPUT);
}

void loop() {
  timeClient.update();  // Get time
  String formattedTime = timeClient.getFormattedTime();

  // Read temperature and humidity from DHT sensor   
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();

  // Simulate temperature using the LDR
  int ldrValue = analogRead(PHOTORESISTOR_PIN);
  if (ldrValue > 700) { // High light (simulating warmth)
    temperature += 5;
  } else if (ldrValue < 300) { // Low light (simulating cold)
    temperature -= 5;
  }

  // Button press to toggle display mode
  if (digitalRead(BUTTON_PIN) == LOW && !buttonPressed) {
    showTime = !showTime;
    buttonPressed = true;
    delay(200); // Debounce delay
  } else if (digitalRead(BUTTON_PIN) == HIGH) {
    buttonPressed = false;
  }

  lcd.clear();

  // Display temperature and humidity or time 
  if (showTime) {
    lcd.setCursor(0, 0);
    lcd.print("Time:");
    lcd.setCursor(0, 1);
    lcd.print(formattedTime);
  } else {
    lcd.setCursor(0, 0);
    lcd.print("Temp: ");
    lcd.print(temperature);
    lcd.print(" C");

    lcd.setCursor(0, 1);
    lcd.print("Humidity: ");
    lcd.print(humidity);
    lcd.print(" %");

    // Send data to server
    if (!isnan(temperature) && !isnan(humidity)) {
      sendDataToServer(temperature, humidity, ldrValue, formattedTime);
    }
  }

  //  LEDs based on temperature
  if (!isnan(temperature)) {
    if (temperature > 0) {
      digitalWrite(RED_LED_PIN, HIGH);  // Red for positive temperature
      digitalWrite(BLUE_LED_PIN, LOW);  // Blue LED off
    } else {
      digitalWrite(RED_LED_PIN, LOW);   // Red LED off
      digitalWrite(BLUE_LED_PIN, HIGH); // Blue LED on for negative temperature
    }
  }

  delay(200);  // then I am adding a bit of delay
}
// function sends sensor data to the server in JSON format
void sendDataToServer(float temperature, float humidity, int lightLevel, String formattedTime) {
  WiFiClient client;

  Serial.println("Connecting to server...");

  if (client.connect(serverUrl, 80)) {
    // Create JSON object
    StaticJsonDocument<200> jsonDoc;
    jsonDoc["sensor_name"] = "DHT11";  
    jsonDoc["temperature"] = temperature;
    jsonDoc["humidity"] = humidity;
    jsonDoc["light_level"] = lightLevel;
    jsonDoc["formatted_time"] = formattedTime;

    // JSON to String
    String jsonString;
    serializeJson(jsonDoc, jsonString);

    // Send POST request
    client.println("POST /data_handler.php HTTP/1.1");
    client.println("Host: http://145.92.189.122/data_handler.php");  // Use your server's IP
    client.println("Content-Type: application/json");
    client.print("Content-Length: ");
    client.println(jsonString.length());
    client.println();
    client.println(jsonString);
    
    Serial.println("Data sent: " + jsonString);
    
    
    while (client.available()) {
      String line = client.readStringUntil('\n');
      Serial.println(line);
    }

    client.stop();  
  } else {
    Serial.println("No connection to server.");
  }
}
























