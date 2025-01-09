# API reference

## Overview

This document provides an overview of the REST API for my web application. It includes details on each endpoint, the request methods, arguments, request bodies, and return values, covering the technologies used in designing, building, and deploying the website and database.

## Technologies I have Used

- **Backend**: The backend is constructed with PHP, which manages data processing and database communication.
- **Frontend**: The frontend is created using HTML, CSS, and JavaScript, offering a responsive and engaging user interface.
- **Database**:  MySQL serves for data storage, using PHPMyAdmin for database management.
- **Deployment**: Docker is used to containerize the application.
- **Version Control**: Git is used for version control.

## API Endpoints

### 1. Submit Sensor Data
- **URL**: `/data_handler.php`
- **Method**: POST
- **Description**: Submits new sensor data to the database.
- **Arguments**: 
  - `temperature` (float): The temperature reading.
  - `humidity` (float): The humidity reading.
  - `lightLevel` (int): The light level reading.
  - `timestamp` (string): The timestamp of the data reading.
- **Body**: JSON object with the above fields.
- **Return Value**: JSON object indicating success or failure of the data submission.

### 2. Get Environment Data

- **URL**: `/data_handler.php`
- **Method**: GET
- **Description**: Retrieves environment data from the database.
- **Parameters**: 
  - `id`,retrieves data for a specific record. If not provided, retrieves all records.
- **Response**: JSON object containing the requested data or an error message.


### Deployment with Docker

Docker is used in this project to simplify the development and deployment process. Specifically, it is used to create a development environment for the project, which includes setting up a web server and a database. This allows me to work on the project locally, without having to manually install and configure these components.

#### Docker Configuration

1. **Docker Compose**: 
   The project uses Docker Compose to define and run multi-container Docker applications, so the `docker-compose.yml` file in the root directory shows the following services:
   - Web server (Nginx)
   - MariaDB (MySQL)
   - PHPMyAdmin
   - Local Tunnel


2. **Nginx Configuration**:


3. **PHPMyAdmin Configuration**:


#### Key Features of Docker Setup

1. **Environment Isolation**: Each component of the application runs in its own container, ensuring isolation and preventing conflicts between different parts of the stack.

2. **Persistent Data**: Allows  real-time development without rebuilding containers.

3. **Network Configuration**: 
   All services are connected through a custom Docker network, allowing for easy communication between containers using service names.

4. **Port Mapping**: 
    The web server is exposed on port 80, making the application accessible via localhost, while PHPMyAdmin is accessible on port 8080.

#### Using Docker for Development

To start the development environment for my project:

1. Ensure Docker and Docker Compose are installed on your system. I have installed it at the beginning of the project.
2. Navigate to the project root directory.
3. Run the following command:

   ```bash
   docker-compose up -d


## Design Choices

### Frontend Design
The frontend of my webpage is designed with a focus on simplicity and functionality. The main layout is created using HTML5 semantic tags for better structure and accessibility. The design is clean and minimalist, with a focus on presenting the weather station data clearly.


1. **Responsive Layout**: The application uses a responsive design approach, with the main content constrained to a maximum width of 800px and centered on the page.

2. **Data Display**: A table is used to present the sensor data, including temperature, humidity, light level, and timestamp, allowing for easy scanning and comparison of data points.

3. **Data Entry Form**: A form is provided for manual data entry.

4. **Color Scheme**: The color palette is kept simple, with a light background (#f4f7fa) for good contrast and readability. Headings use a dark color (#333) to stand out clearly.

5. **Typography**: The application uses Arial as the primary font, with sans-serif as a fallback. 

6. **Interactive Elements**: The table includes action buttons for each data entry, allowing for potential editing or deletion of data points.

7. **Semantic Structure**: The use of semantic HTML tags like `<header>`, `<main>`, and `<section>` improves the document's structure.

### Backend Design
The backend is organized to effectively manage requests and process information. PHP has been selected for its suitability with the current infrastructure and simplicity of integration with MySQL.

### Deployment with Docker
Docker is used in this project to simplify the development and deployment process. Specifically, it is used to create a development environment for the project, which includes setting up a web server and a database. This allows me to work on the project locally, without having to manually install and configure these components.


