# Technical documentation



Introduction:

A system architecture diagram provides a high-level visual representation of the components and their interactions in the Smart Time Registration system. It helps stakeholders and developers understand how different parts—hardware, software, communication protocols, and the database—integrate and function together. 

The Smart Time Registration project is a system designed to track and display time, with additional sensor integration for user settings, environmental feedback, and data communication. The embedded device serves as both a client (sending sensor data) and a server (receiving status messages) over HTTP/HTTPS

![Devices Table](/assets/Image.jpg)
![Devices Table](docs/embedded/Image.jpg)


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

Visual/sensory outputs: Buzzer, LCD display 
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



This Bill of Materials (BOM) outlines all the components required for the successful implementation of the Smart Time Registration project. Each part listed is essential for ensuring the functionality and effectiveness of the system, which includes features such as real-time data display, ambient light adjustment, and user interaction capabilities.
The table below provides detailed information about each component, including the part name, manufacturer, description, quantity needed for the project, and the price (including VAT). This comprehensive overview serves as a guide for sourcing and procuring the necessary materials to construct the IoT system efficiently.




| Part         | Manufacturer  | Description	           | Quantity | Price (incl. VAT) |   | URL
|--------------|---------------|--------------------------|----------|-------------------|-----------------------|
| ESP8266      | [Espressif Systems] | Wi-Fi microcontroller       | 1        | [4, 95]          | https://en.wikipedia.org/wiki/ESP8266#:~:text=The%20ESP8266%20is%20a%20low,Espressif%20Systems%20in%20Shanghai%2C%20China.         
| KY-015       | [Kuongshun Electronic] | Temperature & Humidity Sensor| 1      | [4 ,95]          |  https://www.az-deliveryde/en/products/dht-11-temperatursensor-modul        
| KY-018       | [Keyes brand] | Photoresistor (LDR)         | 1        | [2, 55]          | https://hobbycomponents.com/sensors/160-photoresistive-light-dependent-resistor-module-ky-018#:~:text=Keyes%20brand%20KY%2D018.     
| LCD Display  | [Shenzhen HZY Photoelectric Technology Co] | 16x2 or 20x4 LCD display    | 1        | [3, 45]         | https://hzylcd.en.alibaba.com/company_profile.html?spm=a2700.9099375.35.3.ZgN0hz#top-nav-bar              
| Push Buttons | [Same Sky] | Momentary push buttons      | 1        | [0 ,10]          | https://nl.mouser.com/ProductDetail/Same-Sky/TS02-66-50-BK-100-LCR-D?qs=A6eO%252BMLsxmQ2%2FFf8jET%252BrA%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&gclid=CjwKCAiAxKy5BhBbEiwAYiW--x6iR72tqx0Uc68A-t8MgzaWLuZagSaLW-0zq6WN1GmP771Ftn7JbhoCE8wQAvD_BwE 
| Jumper Wires | [SparkFun] | Jumper wires for connections| 17       | [1 ,75]         |https://nl.mouser.com/ProductDetail/SparkFun/PRT-12795?qs=WyAARYrbSnZ%2FIrMB64nYgw%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&gclid=CjwKCAiAxKy5BhBbEiwAYiW--zEFP5RHZTkgJUONBrGPEdWuuTav4gOHp9lX0mJq57axL7CYA1FnPxoCJ6sQAvD_BwE               
| Breadboard   | [AZDelivery] | Prototyping board           | 1        | [3 ,99 ]          | https://www.amazon.nl/AZDelivery-Mini-Breadboard-compatibel-Inclusief/dp/B07KKJSFM1/ref=asc_df_B07KKJSFM1/?tag=nlshogostdde-21&linkCode=df0&hvadid=709904968515&hvpos=&hvnetw=g&hvrand=17606101980476706710&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9215103&hvtargid=pla-830808834908&psc=1&mcid=ac3e469720bf3d71aa7c7a2e2454492e&gad_source=1 
| Usb-C cable  | [Allteq] | Cable for connection        | 1        | [5,00]           | https://www.allekabels.nl/usb-c-kabel/11518/2259587/usb-c-naar-usb-a-kabel.html?mc=nl-nl&gad_source=1&gbraid=0AAAAAD_j8Rfy6Iau8KUYhDhhyuXYtdDM1&gclid=CjwKCAiAxKy5BhBbEiwAYiW--3D9YmvaGSwT9MmWtxZ8UmtQrc-9oyiOgVMrUVRxUigL9LO0PmoYvxoCF7MQAvD_BwE 

     




