document.addEventListener("DOMContentLoaded", () => {
    fetchSensorData();

    document.getElementById("data-form").addEventListener("submit", async (event) => {
        event.preventDefault();

        const temperature = parseFloat(document.getElementById("temperature").value);
        const humidity = parseFloat(document.getElementById("humidity").value);
        const light_level = parseInt(document.getElementById("light_level").value);

        await addSensorData({ temperature, humidity, light_level });
        fetchSensorData();
    });
});

async function fetchSensorData() {
    try {
        const response = await fetch("http://10.21.51.75/data_handler.php");
        const data = await response.json();

        if (data.error) {
            console.error("Error fetching data:", data.error);
            return;
        }

        const dataTable = document.getElementById("data-tbody");
        dataTable.innerHTML = "";

        data.data.forEach(record => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${record.id}</td>
                <td>${record.temperature}</td>
                <td>${record.humidity}</td>
                <td>${record.light_level}</td>
                <td>${record.timestamp}</td>
                <td><button onclick="deleteSensorData(${record.id})">Delete</button></td>
            `;
            dataTable.appendChild(row);
        });
    } catch (error) {
        console.error("Error loading data:", error);
    }
}

async function addSensorData(newData) {
    try {
        const response = await fetch("http://10.21.51.75/data_handler.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(newData)
        });

        const result = await response.json();

        if (result.error) {
            console.error("Error adding data:", result.error);
        } else {
            console.log("Data added:", result);
        }
    } catch (error) {
        console.error("Error adding data:", error);
    }
}

async function deleteSensorData(id) {
    try {
        const response = await fetch(`http://10.21.51.75/data_handler.php?id=${id}`, {
            method: "DELETE"
        });

        const result = await response.json();

        if (result.error) {
            console.error("Error deleting data:", result.error);
        } else {
            console.log("Data deleted:", result);
            fetchSensorData();
        }
    } catch (error) {
        console.error("Error deleting data:", error);
    }
}
