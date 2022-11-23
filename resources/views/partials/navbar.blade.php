<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">HariSenin.Com SC Kelvin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ $page_route === "Home" ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $page_route === "Category" ? 'active' : '' }}" href="/category">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $page_route === "Asset" ? 'active' : '' }}" href="/asset">Asset</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $page_route === "Product" ? 'active' : '' }}" href="/product">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $page_route === "Product Asset" ? 'active' : '' }}" href="/product_asset">Product Asset</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
