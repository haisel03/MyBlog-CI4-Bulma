<section class="hero is-info">
  <div class="hero-body">
    <h1 class="title">
      Bienvenidos a MyBlog
    </h1>
    <h2 class="subtitle">
      Lista de entrada
    </h2>
  </div>
  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li class="<?= service('request')->uri->getPath() == '/' ? 'is-active' : '' ?>">
            <a href="<?= base_url(route_to('home')) ?>">
              <i class="fas fa-home"></i>&nbsp;Inicio
            </a>
          </li>
          <li class="<?= service('request')->uri->getPath() == 'auth/registro' ? 'is-active' : '' ?>">
            <a href="<?= base_url(route_to('register')) ?>">
              <i class="fas fa-user-plus"></i>&nbsp;Registro
            </a>
          </li>
          <?php if (session()->is_logged) : ?>
            <li>
              <a href="<?= base_url(route_to('posts')) ?>">
              <i class="fas fa-tachometer-alt"></i>&nbsp;ir al Dashboard
              </a>
            </li>
            <li>
              <a href="<?= base_url(route_to('signout')) ?>">
                <i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar Sesión
              </a>
            </li>
          <?php else : ?>
            <li class="<?= service('request')->uri->getPath() == 'auth/login' ? 'is-active' : '' ?>">
              <a href="<?= base_url(route_to('login')) ?>">
                <i class="fas fa-sign-in-alt"></i>&nbsp;Login
              </a>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </nav>
  </div>
</section>