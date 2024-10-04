# Smart time registration 



The purpose of the "Smart Time Registration" blueprint is to create an IoT-based system that tracks and manages time-related tasks using microcontrollers. 
This system captures data from sensors and sends it to a backend application over HTTP or HTTPS for processing. In return, the embedded device receives status messages from the backend, allowing real-time communication

Below is the schematic of my project, designed in Fritzing, which visually represents the components and their connections

![fritzing Table](/assets/fritzing.jpg)

The ESP8266 is the core microcontroller that handles sensor data acquisition, communication with the backend, and control of outputs. It connects to the network using WiFi and facilitates HTTP/HTTPS communication with a backend serve
The next is KY-015 sensor, which monitors the surrounding environment by measuring temperature and humidity levels, which are displayed in real time on the LCD screen.
Also i want to use the photo resistor, whcih adjusts the brightness of the LCD display based on ambient light conditions.
From outputs I am going to use: LCD display, buzzer, LED display
From inputs I am going to use: KY-040 Rotary Encoder (for allowing users to interact with the system by adjusting settings like the time, setting alarms), push Buttons(setting the alarm)
Also in my embedded device there is gona be Real-Time Clock (RTC) and RFID Module for check-ins and check-outs by scanning RFID tags.






















{{ mdocotion_header('https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2670&q=80') }}