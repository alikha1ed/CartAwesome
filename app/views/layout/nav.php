<?php session_start();?>

<nav class="navbar navbar-expand-lg mb-4">
  <div class="collapse navbar-collapse row d-flex justify-content-around pt-2 mb-4">
    <a class="navbar-brand" href="/">
      <img src="/public/images/logo.png" width="250" alt="">
    </a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
    <div id="navbar" class="collapse navbar-collapse row d-flex justify-content-around">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mb-2" href="#" id="categoriesDropDownMenu" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="categoriesDropDownMenu">
            <a class="dropdown-item" href="#">Action</a>
          </div>
        </li>
      </ul>
      <div class="navbar-nav mb-2">
        <?php if (isset($_SESSION['user'])): ?>
          <a class="nav-item nav-link" href="/profile/admin">Profile</a>
          <span class="text-white mt-2 mr-1 ml-1">|</span>
          <a class="nav-item nav-link" href="/login">Logout</a>
        <?php else: ?>
          <a class="nav-item nav-link" href="/register">Create Account</a>
          <span class="my-auto mr-1 ml-1 vertical-line"></span>
          <a class="nav-item nav-link" href="/login">Login</a>
        <?php endif;?>
      </div>
      <a href="#" class="btn btn-info">
        <i class="material-icons text-white mt-3">shopping_cart</i>
      </a>
    </div>
  </nav>