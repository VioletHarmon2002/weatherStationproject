# System Architecture


## Introduction

The System Architecture document serves as a comprehensive guide to understanding the intricate design of my IoT project. This document is like a map that shows how all the different parts of my project fit together and work as a team. 
In this project, we're using cool gadget like the WeMOS D1 to collect data from sensors. These sensors can measure things like temperature and humidity. All this data is then sent to a webserver, where it gets processed and stored in a database. The webserver uses PHP scripts to handle the data, and we have a frontend with HTML, CSS, and JavaScript to display the information in a user-friendly way.
This document also includes a diagram that visually represents the entire system. It shows how each part communicates with the others, using arrows to indicate the flow of data. By looking at this diagram, you can easily see how everything is connected.

## Legenda
- **Square Text Blocks**: Represent hardware and software components.
- **Arrows**: Indicate communication protocols and the direction of data flow.


## System Architecture Diagram
![System Architecture Diagram](docs/assets/arch.jpg)

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


## Communication Protocols:
HTTP/HTTPS: Between the frontend and backend.
I2C/SPI: Between the microcontroller and sensors.
MySQL: Between the backend and the database.
Docker Networking: Between Docker containers.





