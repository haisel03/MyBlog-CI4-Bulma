<?= $this->extend('Front/layout/main') ?>

<?= $this->section('title'); ?>
Login
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
  <div class="container">
    <h1 class="title"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</h1>
    <?php if (session('msg')) : ?>
      <article class="message is-<?=session('msg.type')?>">
      <div class="message-body">
        <?= session('msg.body') ?>
      </div>
    </article>
    <?php endif ?>
   
    <h2 class="subtitle"> Ingresa al sistema ahora! </h2>
    <form action="<?= base_url('auth/check') ?>" method="POST">
      <div class="field">
        <p class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Correo electronico" name="email" value="<?= old('email')?>">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </p>
        <p class="is-danger help"><?=session('errors.email')?></p>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Contraseña" name="password">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
        <p class="is-danger help"><?=session('errors.password')?></p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-info" type="submit">
           <i class="fas fa-sign-in-alt"></i>&nbsp;Ingresar
          </button>
        </p>
      </div>
    </form>
  </div>
</section>
<?= $this->endSection(); ?>