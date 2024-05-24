<style>
   .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999; /* Ensure it appears above other content */
        }
        /* Center the navbar horizontally */
        .navbar-nav {
            display: flex;
            justify-content: center;}
</style>
<section id="navbar">
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="uil-bars text-white"></i>
        </button>
        <a href="/" class="navbar-brand" href="#">KRAKEN</a>
      </div>
      <div class="collapse navbar-collapse" id="toggle-navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#">My account</a>
              </li>
              <li><a class="dropdown-item" href="#">My inbox</a>
              </li>
              <li><a class="dropdown-item" href="#">Help</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Log out</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="uil-comments-alt"></i><span>23</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="uil-bell"></i><span>98</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>

 <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
  <img class="image6" width="65" src="./assets/image6.png" alt="alt text" />
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none" >{{ auth() ->user()->name }}</a>
      </h5>
      <p class="mt-1 mb-0">{{ auth() ->user()->email }}</p>
    </div>
  </div>
  <a href="/profile"><img class="image111" src="./assets/pencil.png" alt="alt text" /></a>
  <div class="search position-relative text-center px-4 py-3 mt-2">
    <input type="text" class="form-control w-100 border-0 bg-transparent" placeholder="Search here">
    <i class="fa fa-search position-absolute d-block fs-6"></i>
  </div>

  <ul class="">
    <li class="">
        <i class="uil-home"></i><a href="{{ url('/') }}"> Home</a>
    </li>

    @if(auth()->user()->role == 'vendeur')
    <li>
      <i class="uil-folder"></i><a href="{{ route('liste_produits') }}">Products</a>
    </li>
    
    <li >
      <i class="uil-folder"></i> <a href="{{ route('categories.index') }}">Categories</a>
  </li>

    
    <li class="">
        <i class="uil-folder"></i> <a href="{{ route('sous_categories.index') }}">Sous Categories</a> </li>
        @endif

    <li class="has-dropdown">
        <i class="uil-shopping-cart-alt"></i><a href="#"> Ecommerce</a>
        <ul class="sidebar-dropdown list-unstyled">
            <li><a href="#">Set coupons</a></li>
            <li><a href="#">Shipping </a></li>
        </ul>
    </li>
    <li class="">
        <i class="uil-map-marker"></i><a href="#"> Cache clear </a>
    </li>

</ul>


</aside>