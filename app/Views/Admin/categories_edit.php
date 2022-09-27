<?= $this->extend('Admin/layout/main'); ?>

<?= $this->section('title'); ?>
Editar categoria <?= $category->name ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<form action="<?= base_url(route_to('categories_update')) ?>" method="post">
  <div class="field">
    <label class="label">Nombre de la categoria</label>
    <div class="control">
    <input type="hidden" value="<?=old('id') ?? $category->id ?>" name="id">
      <input class="input" type="text" value="<?=old('name') ?? $category->name ?>" name="name" placeholder="Nombre de la categoria" >
    </div>
    <p class="help is-danger">
      <?=session('errors.name')?>
    </p>
  </div>
  <div class="field">
    <div class="control">
      <button class="button is-dark" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button>
      <a class="button is-danger" type="reset" href="<?=base_url(route_to('categories'))?>">
        <i class="fas fa-times"></i>&nbsp;Cancelar
      </a>
    </div>
  </div>
</form>
<?= $this->endSection(); ?>