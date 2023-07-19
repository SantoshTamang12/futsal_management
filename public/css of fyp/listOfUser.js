fetch('url/to/your/api')
  .then(response => response.json())
  .then(data => {
    const tableBody = document.getElementById('List');
    data.forEach(record => {
      const row = tableBody.insertRow();
      row.insertCell().textContent = record.name;
      row.insertCell().textContent = record.dateOfBirth;
      row.insertCell().textContent = record.email;
      row.insertCell().textContent = record.gender;
      row.insertCell().textContent = record.location;
      row.insertCell().textContent = record.phone;
    });
  })
  .catch(error => console.error(error));
