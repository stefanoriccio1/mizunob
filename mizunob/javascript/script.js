document.addEventListener('DOMContentLoaded', (event) => {
  // Tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // Popover activator
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  //Offcanvas
  var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
  var offcanvasList = offcanvasElementList.map(function (offcanvasEl) {
      return new bootstrap.Offcanvas(offcanvasEl)
  })

  // Search functionality
  document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const elements = document.querySelectorAll('p, h1, h2, h4, li');
    let found = false;

    elements.forEach(element => {
        element.classList.remove('highlight');
        if (element.innerText.toLowerCase().includes(searchTerm)) {
            element.classList.add('highlight');
            found = true;
        }
    });

    if (!found) {
        const alert = document.getElementById('searchAlert');
        alert.style.display = 'block';
    }
  });

  //Attivare alert di signin + clear form
  document.getElementById('signinbut').addEventListener('click', function() {
    document.getElementById('signinAlert').style.display = 'block';
    document.getElementById("mainSignin").reset();
  });


  //Attivare modale di login su quella di signup
  document.getElementById('alreadyAccount').addEventListener('click', function(event) {
    event.preventDefault(); // Previene il comportamento predefinito del link

    var signinForm = document.getElementById('signinForm');
    var loginForm = document.getElementById('loginForm');
    var toggleDiv = document.getElementById('ahaDiv');

    signinForm.style.display = 'none';
    loginForm.style.display = 'block';
    toggleDiv.style.display = 'none';
  });

});

// Map
document.addEventListener('DOMContentLoaded', function () {
  var map = L.map('map').setView([45.0242, 7.5795], 13); // Coordinate di Beinasco

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([45.0242, 7.5795]).addTo(map)
      .bindPopup('Viale Risorgimento 20, Beinasco')
      .openPopup();
});


document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('add-filter').addEventListener('click', function() {
    const filterContainer = document.getElementById('filter-container');
    if (!filterContainer) {
      console.error('Elemento filter-container non trovato');
      return;
    }

    const newRow = document.createElement('div');
    newRow.className = 'row mb-3';
    newRow.innerHTML = `
      <div class="col-md-6">
      <select class="form-select search-parameters" placeholder="SELEZIONA">
          <option value="" disabled selected>SELEZIONA</option>
          <option value="numero_fattura">Numero Fattura</option>
          <option value="numero_ordine">Numero Ordine</option>
          <option value="codice_prodotto">Codice Prodotto</option>
      </select>
      <small class="form-text text-muted">Seleziona i criteri di ricerca</small>
      </div>
      <div class="col-md-6">
      <input type="text" class="form-control" name="" placeholder="Inserisci valore">
      </div>
    `;
    filterContainer.appendChild(newRow);

    // Adding listener for new Select
    newRow.querySelector('.search-parameters').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex].value;
      var inputField = this.parentElement.nextElementSibling.querySelector('input');
      inputField.name = selectedOption;
    });
  });

  // Adding listener for existing Select
  document.querySelectorAll('.search-parameters').forEach(function(select) {
    select.addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex].value;
      var inputField = this.parentElement.nextElementSibling.querySelector('input');
      inputField.name = selectedOption;
    });
  });

  // Reset filters
  document.getElementById('reset-filters').addEventListener('click', function() {
    const filterContainer = document.getElementById('filter-container');
    if (!filterContainer) {
      console.error('Elemento filter-container non trovato');
      return;
    }

    // Removing all the rows added by the + button
    while (filterContainer.children.length > 2) {
      filterContainer.removeChild(filterContainer.lastChild);
    }

    // Resetting filters and form values
    const selects = filterContainer.querySelectorAll('select');
    selects.forEach(select => select.selectedIndex = 0);

    const inputs = filterContainer.querySelectorAll('input');
    inputs.forEach(input => input.value = '');
  });
});

  // Sign in alert successful
  setTimeout(function() {
    var alert = document.getElementById('signinAlert');
    if (alert) {
      var bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    }
  }, 4000);








