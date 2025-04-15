// Sample data of doctors and their availability time slots
const doctors = [
    { name: "Dr. Smith", availability: ["08:00", "09:00", "10:00", "11:00", "13:00", "14:00", "15:00", "16:00"] },
    { name: "Dr. Johnson", availability: ["09:00", "10:00", "11:00", "14:00", "15:00", "16:00"] },
    // Add more doctors here
];

// Function to display doctor availability based on selected time
function showAvailability() {
    const selectedTime = document.getElementById("timeSelector").value;
    const doctorTableBody = document.getElementById("doctorTableBody");
    doctorTableBody.innerHTML = ""; // Clear previous table body

    doctors.forEach(doctor => {
        const row = document.createElement("tr");

        const nameCell = document.createElement("td");
        nameCell.textContent = doctor.name;

        const availabilityCell = document.createElement("td");
        availabilityCell.textContent = doctor.availability.includes(selectedTime) ? "Available" : "Unavailable";
        availabilityCell.classList.add(doctor.availability.includes(selectedTime) ? "available" : "unavailable");

        row.appendChild(nameCell);
        row.appendChild(availabilityCell);

        doctorTableBody.appendChild(row);
    });
}

