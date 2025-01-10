# API reference

## Overview

This document provides an overview of the REST API for my web application. It includes details on each endpoint, the request methods, arguments, request bodies, and return values, covering the technologies used in designing, building, and deploying the website and database.


## API Endpoints

### 1. Submit Sensor Data
- **URL**: `/data_handler.php`
- **Method**: POST
- **Description**: Submits new sensor data to the database.
- **Arguments**: 
  - `temperature` (float): The temperature reading.
  - `humidity` (float): The humidity reading.
  - `lightLevel` (int): The light level reading.
- **Body**: JSON object with the above fields.
- **Return Value**: JSON object.

![api](/assets/gft.jpg)



### 2. Get Sensor Data
- **URL**: `/data_handler.php`
- **Method**: `GET`
- **Description**: Retrieves environment data from the database.
- **Parameters**:  
  - `id` 
- **Response**: JSON object

## Example of response:

![api](/assets/gdp.jpg)

## 3. Delete Sensor Data

- **URL**: `/data_handler.php`
- **Method**: `DELETE`
- **Description**: Deletes a specific sensor data entry from the database.
- **Parameters**:  
  - `id` 
- **Body**: None
- **Return Value**: JSON object.

## Example Response:

![api](/assets/ds.jpg)


