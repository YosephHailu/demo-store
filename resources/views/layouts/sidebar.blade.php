<div class="d-flex flex-column flex-shrink-0 p-3 bg-light shadow-lg" style="width: 280px; min-height: 100vh">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-4">Sidebar</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="{{ route('home') }}" class="nav-link link-dark {{ (request()->is('home*')) ? 'active' : '' }}">
        <i class="fa fa-dashboard me-2"></i>
        Dashboard
      </a>
    </li>
    @if (Auth::user()->isAdmin())
    <li>
      <a href="{{ route('product.index') }}"
        class="nav-link link-dark {{ (request()->is('product*')) ? 'active' : '' }}">
        <i class="fa fa-star me-2"></i>
        Products
      </a>
    </li>
    <li>
      <a href="{{ route('store.index') }}" class="nav-link link-dark {{ (request()->is('store*')) ? 'active' : '' }}">
        <i class="fa fa-shop me-2"></i>
        Stores
      </a>
    </li>
    <li>
      <a href="{{ route('user.index') }}" class="nav-link link-dark {{ (request()->is('user*')) ? 'active' : '' }}">
        <i class="fa fa-dashboard me-2"></i>
        Users
      </a>
    </li>
    <li>
      <a href="{{ route('user.admins') }}" class="nav-link link-dark {{ (request()->is('admins*')) ? 'active' : '' }}">
        <i class="fa fa-dashboard me-2"></i>
        Admins
      </a>
    </li>
    @else
    <li>
      <a href="{{ route('store.mystore') }}" class="nav-link link-dark {{ (request()->is('store*')) ? 'active' : '' }}">
        <i class="fa fa-shop me-2"></i>
        My Store
      </a>
    </li>
    @endif
    <li>
      <a href="{{ route('product_category.index') }}"
        class="nav-link link-dark {{ (request()->is('product_categories*')) ? 'active' : '' }}">
        <i class="fa fa-ellipses-h me-2"></i>
        Product Categories
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
      data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>