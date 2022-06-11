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
  
      <!-- Right elements -->
      <ul class="navbar-nav flex-row">
        @if(session()->has('user'))
        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="{{ route('store.logout', session()->has('user')) }}" title="Logout of store">
            <span><i class="fas fa-sign-out fa-lg"></i></span> Return to account
          </a>
        </li>
        @endif
        <span class="mt-2">|</span>
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