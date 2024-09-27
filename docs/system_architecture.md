# System Architecture





On this page you can describe the system architecture of your full-project. This includes the architecture of the software, the hardware and the communication between them. Make sure you create a clear overview, don't forget everything that is included in the existing Docker environment.



1.1. Hardware Architecture:

Microcontroller Selection: ESP8266 
Sensors: 
KY-015 (Temperature and Humidity Sensor)
KY-018 (Photo Resistor): To adjust display brightness based on ambient light.
LCD Display (16x2 or 20x4): To display time.
KY-040 (Rotary Encoder): To adjust settings (e.g., time, alarm, brightness)
Push Buttons 
Real-Time Clock (RTC DS3231)

Visual/sensory outputs: Buzzer, LED dispaly, LSD display 
Power Supply:  battery 

1.2. Software Architecture:

Arduino IDE

Backend Application:  PHP, Python, or Node.js to handle HTTP/HTTPS communication between the embedded device and the backend.

Database: MySQL  database to store sensor data and status messages.

Docker Environment: Containerize the backend and database using Docker for consistency across development, testing, and production.

1.3. Communication 

HTTP/HTTPS: 

The embedded device acts as a client and sends measured sensor data to the application backend over http.


REST API: 


1.4 Database
a. Devices table. This table stores information about the devices used in the IoT system
b. Sensors table. This table stores information about the sensors attached to each device
c. Outputs table. This table stores information about the outputs attached to each device
d. Messages table. This table stores status messages received from the backend.



1.5. Docker Environment

Keep your system architecture up-to-date during the project. It is a living document that should reflect the current state of your project.

