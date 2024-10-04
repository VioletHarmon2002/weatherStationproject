# System Architecture

Introduction:

A system architecture diagram provides a high-level visual representation of the components and their interactions in the Smart Time Registration system. It helps stakeholders and developers understand how different parts—hardware, software, communication protocols, and the database—integrate and function together. 

The Smart Time Registration project is a system designed to track and display time, with additional sensor integration for user settings, environmental feedback, and data communication. The embedded device serves as both a client (sending sensor data) and a server (receiving status messages) over HTTP/HTTPS

![Devices Table](/assets/Image.jpg)


System Architecture:


1.1. Hardware Architecture:

Microcontroller Selection: ESP8266 
Sensors: 
KY-015 (Temperature and Humidity Sensor)
Functions:  Displays real-time temperature and humidity on the LCD screen, providing useful environmental information.

KY-018 (Photo Resistor): To adjust display brightness based on ambient light.
Functions:Automatically adjusts the brightness of the LCD display based on surrounding light conditions. This makes the display easier to read and saves power.

LCD Display (16x2 or 20x4):
Functions: displays real time data, while the buzzer and LED display provide sensory feedback.

KY-040 (Rotary Encoder).
Functions: allows users to adjust settings like the time, set alarms, or fine-tune display brightness.

Push Buttons.  
Functions: Allows manual control for settings like alarm or reseting the system

Real-Time Clock (RTC DS3231)
Functions: Maintains accurate time even when the microcontroller is powered off.

RFID: 
Functions:  Tracks when someone interacts with the system, possibly logging attendance or access times.

Visual/sensory outputs: Buzzer, LED dispaly, LSD display 
Power Supply:  battery 


1. Fritzing Table 
![fritzing Table](/assets/fritzing.jpg)



1.2. Software Architecture:

Arduino IDE

Backend Application:  PHP, Python, or Node.js to handle HTTP/HTTPS communication between the embedded device and the backend.

Database: MySQL  database to store sensor data and status messages.

Docker Environment: Containerize the backend and database using Docker for consistency across development, testing, and production.

1.3. Communication 

HTTP/HTTPS: 
The smart time registration system operates  over HTTP/HTTPS, enabling the microcontroller to send sensor data to the backend. 
1. The ESP8266 collects data from sensors and formats it into structured request.
2. The formated data is being sent to backend using HTTP/HTTPS requests.
3. The backend(using PHP) processes the incoming data, updates mysql.
4. The backend sends staues messages to the embedded device, whcih displayes the data, using LED. 


1.4 Database
a. Devices table. This table stores information about the devices used in the IoT system
b. Sensors table. This table stores information about the sensors attached to each device
c. Outputs table. This table stores information about the outputs attached to each device
d. Messages table. This table stores status messages received from the backend.


1.5. Docker Environment

Docker Environment

Docker Registry: The Docker registry stores the Docker images used for the Smart Time Registration project. 

Docker Host: The Docker host runs Docker containers, providing a virtualized hardware environment for the Smart Time Registration system. This setup allows for the isolation of components, including the web server, database, and backend services, ensuring that each part of the application can operate independently and reliably.

Docker Containers: Each component of the system—such as the web server (NGINX), database (MariaDB), PHP application, and additional services like PHPMyAdmin—runs in its own container. This containerization approach simplifies deployment and scaling while maintaining a clean separation.




portfolio link  [Smart Time Registration  Documentation](https://guudeemiiree57-iot-2024-2025-semester-1-individu-aa710d5251c8b8.dev.hihva.nl/web/database/).



