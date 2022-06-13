<div class="d-flex flex-column flex-shrink-0 p-3 bg-light shadow-lg" style="width: 280px; min-height: 100vh">
  <a href="/" class="mx-auto">
    <img src="https://gebeya.com/wp-content/uploads/2022/01/Submit-your-application-%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F-2assets.png" style="width: 150px" class="mx-auto" alt="">
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
</div>