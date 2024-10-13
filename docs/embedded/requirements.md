# Requirements

![Devices Table](/assets/systemreq.jpg)

For my project i need to:

1. EMBRQ#01: SENDING DATA TO BACKEND
To implement the communication using HTTP protocol where the ESP8266 sends sensor data (temperature, humidity, light) from KY-015 and KY-018 sensors to a backend server. The data is sent over HTTP using WiFiClient and HTTPClient.
2. EMBRQ#02: RECEIVING DATA FROM BACKEND
The ESP8266 is configured as a server to receive status updates from the backend. It listens to incoming requests and processes commands (such as setting alarms or updating the clock).
3. EMBRQ#03: AT LEAST TWO TYPES OF INPUT SENSORS
I want to  connect two input sensors: the KY-015 (Temperature and Humidity Sensor) and the KY-018 (Photo Resistor) to the ESP8266. These sensors provide temperature, humidity, and light data.
4. EMBRQ#04: AT LEAST TWO TYPES OF VISUAL OR SENSORY OUTPUTS
I want to implement an LCD display and a buzzer as visual and sensory outputs. The LCD displays real-time data, while the buzzer can be used to alert users for alarms or other notifications.
5. EMBRQ#05: WIFI MANAGER
The embedded device must use WiFiManager for configuration of SSID and password (PWD) for connecting to the network.


To build your embedded device you need to have a clear idea of the requirements. On this page you can describe the requirements of your embedded device. This includes the requirements from DLO, but also your own requirements.



Add some images! 😉