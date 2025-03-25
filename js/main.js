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
                        <td>${client.email}</td>
                        <td>${client.phone}</td>
                        <td>${client.notes}</td>
                        <td><button class="btn btn-danger btn-sm" onclick="deleteClient(${client.id})">Delete</button></td>
                    </tr>
                `;
                tableBody.innerHTML += table;
            });
        })
        .catch(error => console.error("Greska pri ucitavanju podataka!", error));
}


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
            .catch(error => console.error('Greska, klijent nije obrisan!', error));
    }
}
window.onload = loadClients;