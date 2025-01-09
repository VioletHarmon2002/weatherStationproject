# System Architecture


## Introduction

The document is a guide to understand the complex structure of my IoT project.The document is like a map showing how all the different parts of my project combine with each other and work like a single command.My project uses  gadgets, such as the WEMOS D1 mini, to collect data from sensors. These sensors can measure parameters such as temperature and humidity. All this data is sent to a web server, where it is processed and stored in a database. The web server processes the data using PHP scripts and displays the information in a user-friendly form on the front panel using HTML, CSS and JavaScript.The document also includes a diagram that visually represents the entire system. It shows how each part interacts with other parts, using arrows to indicate the data flow. Thanks to this diagram, it is easy to understand how everything is interconnected.

## Legenda
- **Square Text Blocks**: Represent hardware and software components.
- **Arrows**: Indicate communication protocols and the direction of data flow.


## System Architecture Diagram
![system architecture](/assets/arch.png)

## Components Description

### Embedded System (Subsystem)
- **WeMOS D1**: Hardware component for IoT connectivity.
- **C/C++ Programs**: Software components running on the hardware.
- **C/C++ Arduino Libraries**: Software libraries used in the embedded system.
- **Sensors**: Hardware components for data collection.

### Webserver (Subsystem)
- **PHP Module**: Software component for server-side scripting.

### Frontend (Subsystem)
- **HTML Files**: Software components for structuring web content.
- **CSS Files**: Software components for styling web content.
- **JavaScript Files**: Software components for client-side scripting.

### Backend (Subsystem)
- **API PHP Files**: Software components for backend logic.

### Database System (Subsystem)
- **MariaDb**: Data storage component.
- **PhpMyAdmin**: Running instance of the database.

### Docker Host (Subsystem)
- **Docker Network**: Virtual hardware component for container networking.
- **Docker Containers**: Virtual hardware components for running applications.

### MacBook (External System / Hardware Component)
- **Laptop Device**: External system software component.
- **Browser**: External system software component for accessing web content.

### Network Access Point (External System / Hardware Component)

### GitLab Repository (External System / Software Component)

### Internet


## Data Flow

1. The WeMos D1 Mini collects data from the DHT22 and LDR sensors.
2. The microcontroller processes this data, updates the LCD display, and controls the LEDs.
3. The processed data is sent to the web server via WiFi using HTTP POST requests.
4. The PHP backend (`data_handler.php`) receives this data and stores it in the MariaDB database.
5. The frontend JavaScript periodically fetches the latest data from the API using GET requests.
6. The web interface updates in real-time to display the current environmental conditions.


## Communication Protocols:
HTTP/HTTPS: Between the frontend and backend.
I2C/SPI: Between the microcontroller and sensors.
MySQL: Between the backend and the database.
Docker Networking: Between Docker containers.






