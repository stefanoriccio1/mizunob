<header id="header">
  <?php include '../includes/loginVerify.inc.php' ?>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../html/homepage.php">
        <img src="../img/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top rounded-circle">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../html/homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../html/signin.php">Sign In</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Help
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../html/help.php">Help Guide</a></li>
              <li><a class="dropdown-item" href="returns.php">Returns</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="contacts.php">Contacts</a></li>
            </ul>
          </li>
        </ul>
        <!-- Welcoming popup (if user is logged in) -->
        <div class="d-flex" id="loggedUser" style="display: <?php echo $isLoggedIn ? 'flex' : 'none'; ?> !important; margin-right: 5px; align-items: center;">
          <span style="margin-right: 5px">Welcome, <?php echo htmlspecialchars($userName); ?>!</span>
          <form action="../includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-danger ml-2">Logout</button>
          </form>
        </div>
        <form class="d-flex" role="search" id="searchForm">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Second Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary" id="secondNavbar">
    <div class="container-fluid">
      <div class="navbarBrand col-3 d-flex align-items-center">
        <img src="../img/navbar.png" alt="Logo" width="45" height="45" class="d-inline-block align-text-top">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#secondNavbarNavDropdown" aria-controls="secondNavbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse col-6" id="secondNavbarNavDropdown">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="shoes.php">Shoes</a></li>
              <li><a class="dropdown-item" href="#">Accessories</a></li>
              <li><a class="dropdown-item" href="#">T-shirt</a></li>
              <li><a class="dropdown-item" href="#">Sweatshirts</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:red;">
              Gift Guide
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Make a gift!</a></li>
              <li><a class="dropdown-item" href="#">Giftcards</a></li>
              <li><a class="dropdown-item" href="#">Happy Birthday!</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Customer News
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">New Arrivals</a></li>
              <li><a class="dropdown-item" href="#">Sport News</a></li>
              <li><a class="dropdown-item" href="#">Mizuno News</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="secondNavbarIcon col-3 d-flex justify-content-end">
        <ul class="list-group list-group-horizontal" id="cartbar">
          <li class="list-group-item" style="display: <?php echo $isLoggedIn ? 'block' : 'none'; ?>">
            <a href="profile.php" type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="My Profile">
              <i class="fa-solid fa-user"></i>
            </a>
          </li>
          <li class="list-group-item" style="display: <?php echo $isLoggedIn ? 'block' : 'none'; ?>">
            <a href="wishlist.php" type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="My Wishlist">
              <i class="fa-solid fa-heart"></i>
            </a>
          </li>
          <li class="list-group-item" style="display: <?php echo $isLoggedIn ? 'block' : 'none'; ?>">
            <a href="cart.php" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="My Cart">
              <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="alert alert-warning alert-dismissible fade show" role="alert" id="searchAlert" style="display: none;">
    Not Found! Try again!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</header>