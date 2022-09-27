<?= $this->extend('Admin/layout/main') ;?>

<?= $this->section('title') ;?>
Lista de categorias 
<?= $this->endSection() ;?>

<?= $this->section('content') ;?>
<div class="field">
  <a class="button is-dark" href="<?=base_url(route_to('categories_create'))?>">Agregar Nueva Categoria</a>
</div>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Creado</th>
      <th>Actualizado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($categories as $c): ?>
      <tr>
        <td><strong><?=$c->name ?></strong></td>
        <td><?=$c->created_at->humanize() ?></td>
        <td><?=$c->updated_at->humanize() ?></td>
        <td>
          <a class="button is-info is-small" href="<?=$c->getEditLink()?>">
            <span class="icon is-small">
              <i class="fas fa-edit"></i>
            </span>
            <span>Editar</span>
          </a>
          <a class="button is-danger is-small"  href="<?=$c->getDeleteLink()?>">
            <span class="icon is-small">
              <i class="fas fa-times"></i>
            </span>
            <span>Eliminar</span>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<?= $pager->links() ?>


<?= $this->endSection() ;?> 