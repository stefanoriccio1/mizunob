document.addEventListener('DOMContentLoaded', (event) => {
  //tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // popover activator
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  //toast activator
  // document.getElementById("toastbtn").onclick = function() {
  //     var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  //     var toastList = toastElList.map(function(toastEl) {
  //         return new bootstrap.Toast(toastEl)
  //     })
  //     toastList.forEach(toast => toast.show())
  // }

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





