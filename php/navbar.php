<?php
session_start();

$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['quantity'];
    }
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Bx1ynxUcbtLDuM9Ff5gHGdZT3lc+SpmfOEgUpWrIOViCvCBs99V9Pl1bs4rDIBB+" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Lw7pWPY7a5JYBI/tS26Dozvnv1TG/XVd8f2WpxdcoITmI4bz8j/91XqncNyicKsE" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/SnapMart/"><img src="http://localhost/SnapMart/images/snap_logo.png" alt="logo" width="100px"></a>
    <form class="d-flex search-form" role="search">
        <div class="search-container">
        <input class="form-control me-2 rounded-pill search-input" type="text" placeholder="Search" aria-label="Search">
<i class="fa-solid fa-magnifying-glass search-icon" type="submit"></i></div>
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 menu-bar d-flex justify-content-around w-100">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/SnapMart/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button">Category</a>
          <ul class="dropdown-menu">
            <?php
            $data=$db->query("SELECT * FROM category");
            while($array=$data->fetch_assoc()){
           echo "<li><a class='dropdown-item' href='http://localhost/SnapMart/category/".$array['category_url']."'>".$array['category_name']."</a></li>";}
           ?>
           </ul>
          <li class='nav-item dropdown'>
            <?php
            if(empty($_COOKIE["sm_auth_ui"])){
              // If the user not logged in,
              echo "<a class='nav-link' href='http://localhost/SnapMart/Login'>Account <i class='fa-duotone fa-solid fa-user'></i></a>
              <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='http://localhost/SnapMart/Login'>Login <i class='fa-duotone fa-regular fa-arrow-up-to-arc'></i></a></li>
            <li><a class='dropdown-item' href='http://localhost/SnapMart/Sign-Up'>Register <i class='fa-duotone fa-regular fa-arrow-right-to-arc'></i></a></li>
            </ul>";
            }
            else{
              // If the user is logged in-
            $user_id = base64_decode($_COOKIE["sm_auth_ui"]);
            $result = $db->query("SELECT * FROM register WHERE email='$user_id'"); // Replace 'users' and 'name' with your actual table and column names
            $user = $result->fetch_assoc();
            $userName = $user['full_name'];

              echo "<a class='nav-link' >".$userName." <i class='fa-duotone fa-solid fa-user'></i></a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='http://localhost/SnapMart/Orders'>My Orders <i class='fa-duotone fa-solid fa-bags-shopping'></i></a></li>
            <li><a class='dropdown-item' href='http://localhost/SnapMart/Log-out'>Logout <i class='fa-duotone fa-solid fa-arrow-left-from-bracket'></i></a></li>
            </ul>";
            }
            ?> 
        </li>
        <li class="nav-item" title="Cart" data-bs-toggle="tooltip" data-bs-placement="right">
          <a class="nav-link" aria-current="page" href="http://localhost/SnapMart/Cart"><i class="fa-regular fa-cart-shopping-fast fs-5"></i></i><span class="cart-count badge bg-danger"><?= $cart_count ?></span></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<b>
  <style>
  /* Ensure the dropdown stays hidden by default */
  a{text-decoration:none;color:inherit;}
.nav-item.dropdown:hover .dropdown-menu {
  display: block;
  visibility: visible;
  opacity: 1;
}

.nav-item.dropdown .dropdown-menu {
  display: none;
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}


.nav-item.dropdown:hover .dropdown-menu {
  opacity: 1;
  visibility: visible;
  display: block;
}
.navbar{
    backdrop-filter: blur(10px); 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }
  .bg-body-tertiary {
    --bs-bg-opacity: 0.3;
}
.navbar:hover {
  --bs-bg-opacity: 0.9;
    box-shadow: 0 6px 15px rgba(61, 61, 61, 0.2); /* Darker shadow on hover */
  }

</style>
<script>
      $(document).ready(function() {
    // Initialize all tooltips in the document
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Search form submission handling
    $(".search-form").submit(function (e) {
    e.preventDefault();
    var srch = $(".search-input").val().trim();
    if (srch) {
        location.href = "http://localhost/SnapMart/Search/" + encodeURIComponent(srch);
    } 
});

});
   
</script>
    