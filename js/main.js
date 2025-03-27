document.addEventListener("DOMContentLoaded", function () {
    loadClients();
});

function loadClients() {
    fetch("get_clients.php")
        .then(response => response.json())
        .then(data => {
            const clientsTable = document.getElementById("clientsTable");
            clientsTable.innerHTML = "";

            data.forEach(client => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${client.first_name}</td>
                    <td>${client.last_name}</td>
                    <td>${client.email}</td>
                    <td>${client.notes}</td>
                    <td>${client.phone}</td>
                    <td>
                        <button class="btn btn-sm btn btn-warning" onclick="editClient(${client.id})">Edit</button>
                        <button class="btn btn-sm btn btn-danger" onclick="deleteClient(${client.id})">Delete</button>
                    </td>
                `;
                clientsTable.appendChild(row);
            });
        })
        .catch(error => console.error("Error loading data!", error));
}

function editClient(id) {
    window.location.href = `./views/update_client.view.php?id=${id}`;
}
