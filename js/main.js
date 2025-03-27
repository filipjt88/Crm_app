// Load clients
function loadClients() {
    fetch('get_clients.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("clientsTable");
            tableBody.innerHTML = '';
            data.forEach(client => {
                let table = `
                    <tr>
                        <td>${client.first_name}</td> 
                        <td>${client.last_name}</td>
                        <td>${client.email}</td>3
                        <td>${client.phone}</td>
                        <td>${client.notes}</td>
                        <td><a href="./views/update_client.view.php" class="link-opacity-10"><button class="btn-sm btn btn-warning" onclick="editClient(${client.id}, '${client.first_name}', '${client.last_name}', '${client.email}', '${client.phone}', '${client.notes}')">Update</button></a></td>
                        <td><button class="btn btn-danger btn-sm" onclick="deleteClient(${client.id})">Delete</button></td>
                    </tr>
                `;
                tableBody.innerHTML += table;
            });
        })
        .catch(error => console.error("Error loading data!", error));
}

// Delete client
function deleteClient(id) {
    if (confirm("Are you sure you want to delete this client?")) {
        fetch('delete_client.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    loadClients();
                } else {
                    alert(data.error);
                }
            })
            .catch(error => console.error('Error, client not deleted!', error));
    }
}

// Edit client
function editClient(id, firstName, lastName, email, phone, notes) {
    document.getElementById('clientId').value = id;
    document.getElementById('firstName').value = firstName;
    document.getElementById('lastName').value = lastName;
    document.getElementById('email').value = email;
    document.getElementById('phone').value = phone;
    document.getElementById('notes').value = notes;


    document.getElementById('updateForm').addEventListener("submit", function (e) {
        e.preventDefault();
        let id = document.getElementById('clientId').value;
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let notes = document.getElementById('notes').value;

        updateForm.style.display = 'block';

        fetch('update_client.php', {
            method: "POST",
            headers: { "Content-Type": 'application/x-www-form-urencoded' },
            body: `id=${id}&first_name=${firstName}&last_name=${lastName}&email=${email}&phone=${phone}&notes=${notes}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    loadClients();
                    document.getElementById('updateForm').reset();
                } else {
                    alert(data.error);
                }
            })
            .catch(error => console.error("Error update client!", error));
    });
}

window.onload = loadClients;
document.addEventListener("DOMContentLoaded", function () {
    loadClients();
});