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
- **Return Value**: JSON object indicating success or failure of the data submission.

## Example request body:
{
  "temperature": 25.5,
  "humidity": 60.0,
  "light_level": 500
}



## Example of response: 
{
  "success": "Data inserted successfully.",
  "id": 3
}



### 2. Get Sensor Data
- **URL**: `/data_handler.php`
- **Method**: `GET`
- **Description**: Retrieves environment data from the database.
- **Parameters**:  
  - `id` 
- **Response**: JSON object containing the requested data or an error message.

Example of response: 

  {
    "data": [
      {
        "id": 1,
        "temperature": 25.5,
        "humidity": 60.0,
        "light_level": 500,
        "timestamp": "2024-01-01 12:00:00"
      }

## 3. Delete Sensor Data

- **URL**: `/data_handler.php`
- **Method**: `DELETE`
- **Description**: Deletes a specific sensor data entry from the database.
- **Parameters**:  
  - `id` *(required)*: The ID of the data entry to delete.
- **Body**: None
- **Return Value**: JSON object.
- **Example Response**:

  {
    "success": "Data deleted successfully."
  }


