<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <div class="d-flex">
        <!-- Brand -->
        <a class="me-2 mb-1 d-flex align-items-center text-black" href="#">
          <i class="fas fa-bars fa-lg"></i>
        </a>
  
        <!-- Search form -->
        <form class="input-group w-auto my-auto d-none d-sm-flex">
          <input
            autocomplete="off"
            type="search"
            class="form-control rounded"
            placeholder="Search"
            style="min-width: 125px;"
          />
          <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter" style="right: 0"
            ><i class="fas fa-search"></i
          ></span>
        </form>
      </div>
      <!-- Left elements -->
  
      <!-- Center elements -->
      <ul class="navbar-nav flex-row d-none d-md-flex">
        <li class="nav-item me-3 me-lg-1 active">
          <a class="nav-link" href="#">
            <span><i class="fas fa-home fa-lg"></i></span>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-flag fa-lg"></i></span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-video fa-lg"></i></span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-shopping-bag fa-lg"></i></span>
          </a>
        </li>
  
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fas fa-users fa-lg"></i></span>
            <span class="badge rounded-pill badge-notification bg-danger">2</span>
          </a>
        </li>
      </ul>
      <!-- Center elements -->
  
      <!-- Right elements -->
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link d-sm-flex align-items-sm-center" href="#">
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp"
              class="rounded-circle"
              height="22"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
            <strong class="d-none d-sm-block ms-1">{{Auth::user()->name}}</strong>
          </a>
        </li>
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="{{ route('logout') }}" title="Logout">
            <span><i class="fas fa-sign-out fa-lg"></i></span>
          </a>
        </li>
      </ul>
      <!-- Right elements -->
    </div>
  </nav>
  <!-- Navbar -->