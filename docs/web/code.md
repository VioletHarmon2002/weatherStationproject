# Web Code

### Front-End Files

[GitLab Repository - Web Files](https://gitlab.fdmci.hva.nl/IoT/2024-2025-semester-1/individual-project/guudeemiiree57/-/tree/main/web?ref_type=heads)


1. **`index.html`**:
   - The main HTML structure for the dashboard.
   - Contains a table for displaying sensor data and a form for adding new data.
   - The page is styled using `styles.css` and functionality is added through `script.js`.

2. **`styles.css`**:
   - Provides basic styling for the dashboard, including layout, table design, form inputs, and button styles.
   - Uses a simple color scheme for visual appeal and clarity.

3. **`script.js`**:
   - Contains the JavaScript logic for interacting with the backend via AJAX requests.
   - Handles data fetching, adding new sensor data, and deleting data.
   - Dynamically updates the page to reflect changes in the sensor data.

### Back-End Files

1. **`data_handler.php`**:
   - Handles requests for interacting with the MySQL database.
   - Supports three methods:
     - **GET**: Fetches sensor data from the database.
     - **POST**: Adds new sensor data to the database.
     - **DELETE**: Deletes specific sensor data based on its ID.
   - Uses prepared statements to ensure secure interactions with the database.

2. **MySQL Database**:
   - The data is stored in a MySQL database named `weatherstation`.
   - The table used for storing sensor data is `EnvironmentData`, which includes fields for `id`, `temperature`, `humidity`, `light_level`, and `timestamp`.



