document.addEventListener('DOMContentLoaded', (event) => {
  //tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // popover activator
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  //offcanvas
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

  //attivare alert di signin + clear form
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

// mappa
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
      <select class="form-select" placeholder="SELEZIONA">
          <option value="" disabled selected>SELEZIONA</option>
          <option>Numero Fattura</option>
          <option>Numero Ordine</option>
          <option>Numero Bolla</option>
          <option>Codice Prodotto</option>
          <option>Data di consegna richiesta</option>
      </select>
      <small class="form-text text-muted">Seleziona i criteri di ricerca</small>
      </div>
      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Inserisci valore">
      </div>
    `;
    filterContainer.appendChild(newRow);
  });

  document.getElementById('reset-filters').addEventListener('click', function() {

    const filterContainer = document.getElementById('filter-container');
    if (!filterContainer) {
      console.error('Elemento filter-container non trovato');
      return;
    }

    // removing all the rows added by the + button
    while (filterContainer.children.length > 2) {
      filterContainer.removeChild(filterContainer.lastChild);
    }

    // resetting filters and form values
    const selects = filterContainer.querySelectorAll('select');
    selects.forEach(select => select.selectedIndex = 0);

    const inputs = filterContainer.querySelectorAll('input');
    inputs.forEach(input => input.value = '');
  });

});


// sign in alert successful
document.addEventListener('DOMContentLoaded', function() {
  // Hide the alert after 4 seconds
  setTimeout(function() {
      var alert = document.getElementById('signinAlert');
      if (alert) {
          var bsAlert = new bootstrap.Alert(alert);
          bsAlert.close();
      }
  }, 4000);
});








