// Function to fetch data from the database
async function fetchData() {
  try {
      const response = await fetch('fetch_data.php'); // Path to your PHP script
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }
      const data = await response.json();
      updateDataTable(data); // Call function to update the data table
  } catch (error) {
      console.error('Error fetching data:', error);
  }
}

// Function to update the data table with the fetched data
function updateDataTable(data) {
  const dataBody = document.getElementById('data-body');
  dataBody.innerHTML = ''; // Clear existing data

  data.forEach(row => {
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
          <td>${row.sensor_id}</td>
          <td>${row.temperature} °C</td>
          <td>${row.humidity} %</td>
          <td>${row.light_level}</td>
          <td>${row.timestamp}</td>
      `;
      dataBody.appendChild(newRow); // Append the new row to the table body
  });
}

// Call fetchData when the "Time Data" section is shown
document.addEventListener('DOMContentLoaded', () => {
  const timeDataLink = document.querySelector('a[data-target="data"]');
  timeDataLink.addEventListener('click', () => {
      fetchData(); // Fetch data when the section is accessed
  });
});
