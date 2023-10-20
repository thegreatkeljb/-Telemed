// PATIENT
window.addEventListener("DOMContentLoaded", function() {
    getHealthcareProviders();
    getAppointments();
});
document.getElementById("logout").addEventListener("click", function() {
    var formData = new FormData();
    formData.append("patient-logout", 1);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scripts/php/patient_user.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            window.location.replace("index.php");
        }
    }
    xhr.send(formData);
});
document.getElementById("submit").addEventListener("click", function(e) {
    e.preventDefault();
    const healthcareProvider = document.getElementById("hcprovider");
    const dateOfAppointment = document.getElementById("dateappt");
    const message = document.getElementById("message");
    const date = new Date(dateOfAppointment.value);
    if(healthcareProvider.value && !isNaN(date) && message.value != '') {
        submitAppointment();
    } else {
        alert("Please fill out all of the fields.");
    }
});
function getHealthcareProviders() {
    var formData = new FormData();
    formData.append("get-available-providers", 1);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scripts/php/patient_user.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            const provider = document.getElementById("hcprovider");
            const response = xhr.responseText;
            const data = JSON.parse(response);
            const healthcareProviders = data.providers
            for(var i of healthcareProviders) {
                const option = document.createElement("option");
                option.textContent = i.name;
                option.value = i.username;
                provider.add(option);
            }
        }
    }
    xhr.send(formData);
}
function getAppointments() {
    var formData = new FormData();
    formData.append("get-appointments", 1);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scripts/php/patient_user.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            const appointments = document.getElementById("appointments");
            const response = xhr.responseText;
            const data = JSON.parse(response);
            const appointmentsGet = data.appointments;
            if(appointmentsGet.length == 0) {
                appointments.innerHTML = "<i>No appointments</i>";
            } else {
                for(var i of appointmentsGet) {
                    const box = document.createElement("div");
                    box.classList.add("row");
                    box.classList.add("alert");
                    const provider = document.createElement("div");
                    provider.classList.add("col-3");
                    provider.innerHTML = "<strong>" + i.healthcare_provider + "</strong>";
                    box.appendChild(provider);
                    const message = document.createElement("div");
                    message.classList.add("col-6");
                    message.innerHTML = i.message;
                    box.appendChild(message);
                    const date = document.createElement("div");
                    date.classList.add("col-3");
                    const orgDate = new Date(i.date);
                    const formattedDate = orgDate.toLocaleDateString("en-US", {
                        year: "numeric",
                        month: "long",
                        day: "numeric"
                    });
                    date.innerHTML = formattedDate;
                    box.appendChild(date);
                    const todayDate = new Date().toISOString().slice(0, 10);
                    if(i.accepted == 'NO' || i.date != todayDate) {
                        box.classList.add("alert-secondary");
                    } else {
                        box.classList.add("alert-secondary-primary");
                    }
                    appointments.appendChild(box);
                }
            }
        }
    }
    xhr.send(formData);
}
function submitAppointment() {
    const healthcareProvider = document.getElementById("hcprovider");
    const dateOfAppointment = document.getElementById("dateappt");
    const message = document.getElementById("message");
    var formData = new FormData();
    formData.append("submit-appointment", 1);
    formData.append("provider", healthcareProvider.value);
    formData.append("date", dateOfAppointment.value);
    formData.append("message", message.value);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scripts/php/patient_user.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    }
    xhr.send(formData);
}