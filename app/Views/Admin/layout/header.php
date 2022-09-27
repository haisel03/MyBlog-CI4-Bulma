<section class="hero is-dark">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            My Blog con CI4
          </a>
        </div>
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item">
              <?= session()->username ?>
            </a>
            <a class="navbar-item" href="<?= base_url(route_to('signout')) ?>">
              <i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar Sesión
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div class="hero-body">
    <h1 class="title">
      Dashboard de MyBlog
    </h1>
    <h2 class="subtitle">
      Admisitra tu blog tu mismo
    </h2>
  </div>
  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li class="<?= service('request')->uri->getPath() == 'admin/articulos' ? 'is-active' : '' ?>">
            <a href="<?= base_url(route_to('posts')) ?>">
              <i class="fas fa-newspaper"></i>&nbsp;Articulos
            </a>
          </li>
          <li class="<?= preg_match('|^admin/categorias(\S)*$|',service('request')->uri->getPath(), $matches) ? 'is-active' : '' ?>">
            <a href="<?= base_url(route_to('categories')) ?>">
              <i class="fas fa-tags"></i>&nbsp;Categorias
            </a>
          </li>
          <li class="<?= service('request')->uri->getPath() == 'admin/users' ? 'is-active' : '' ?>">
            <a href="<?= base_url(route_to('users')) ?>">
              <i class="fas fa-users"></i>&nbsp;Usuarios
            </a>
          </li>
      </div>
    </nav>
  </div>
</section>