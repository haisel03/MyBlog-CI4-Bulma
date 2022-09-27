<?= $this->extend('Front/layout/main') ?>
<?= $this->section('title'); ?>
Registro de usuario
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
  <div class="container">
    <h1 class="title">Registrate ahora!</h1>
    <h2 class="subtitle">
      Solo debe ingresar algunos datos para comenzar a publicar.
    </h2>
    <form action="<?=base_url('auth/store')?>" method="POST">
    <div class="field">
      <label class="label">Nombre</label>
      <div class="control">
        <input class="input" type="text" value="<?= old('name')?>" name="name" placeholder="Nombre">
      </div>
      <p class="help is-danger"><?= session('errors.name')?></p>
    </div>
    <div class="field">
      <label class="label">Apellidos</label>
      <div class="control">
        <input class="input" type="text" value="<?= old('lastname')?>" name="lastname" placeholder="Apellidos">
      </div>
      <p class="help is-danger"><?= session('errors.lastname')?></p>
    </div>

    <div class="field">
      <label class="label">Correo</label>
      <div class="control">
        <input class="input" type="email" placeholder="Correo electronico" name="email" value="<?= old('email')?>" >
      </div>
      <p class="help is-danger"><?= session('errors.email')?></p>
    </div>

    <div class="field">
      <label class="label">Elige tu país</label>
      <div class="control">
        <div class="select">
          <select class="" name="id_country">
            <option disabled selected>Seleccione...</option>
            <?php foreach ($countries as $v) : ?>
              <option value="<?=$v->id_country?>" <?= ($v->id_country == old('id_country') ? 'selected' : null) ?> ><?=$v->name?></option>
            <?php endforeach ?>
          </select>
        </div>
        <p class="help is-danger"><?= session('errors.id_country')?></p>
      </div>
    </div>
    <div class="field">
      <label class="label">Contraseña</label>
      <div class="control">
        <input class="input" type="password"  name="password" placeholder="Contraseña" value="<?= old('password')?>">
      </div>
      <p class="help is-danger"><?= session('errors.password')?></p>
    </div>
    <div class="field">
      <label class="label">Confirmacion de contraseña</label>
      <div class="control">
        <input class="input" type="password" name="c-password" placeholder="Repite la contraseña" value="<?= old('c-password')?>">
      </div>
    </div>
    <div class="field is-grouped">
      <div class="control">
        <button class="button is-info" type="submit">
          <i class="fas fa-save"></i>&nbsp;Registrarse
        </button>
      </div>
    </div>
    </form>
  </div>

</section>

<?= $this->endSection(); ?>