<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="/images/logoweb.png" alt="logo aljauhar" class="img-fluid" style="height: 3rem">
    </a>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="/" class="{{ request()->is('/') ? 'active' : ''}}">Home</a></li>
        <li><a href="/blog" class="{{ request()->is('/blog') ? 'active' : ''}}">Blog</a></li>
        <li><a href="/login" class="{{ request()->is('/login') ? 'active' : ''}}">Login</a></li>
      </ul>
    </nav>
  </div>
</header>