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
                    </tr>
                `;
                tableBody.innerHTML += table;
            });
        })
        .catch(error => console.error("Greska pri ucitavanju podataka!", error));
}
window.onload = loadClients;