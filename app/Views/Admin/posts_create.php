<?= $this->extend('Admin/layout/main'); ?>

<?= $this->section('title'); ?>
 Nuevo Articulo
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<p class="title is-4 is-center">Crea un nuevo articulo</p>
  <form action="<?=base_url(route_to('posts_store'))?>" enctype="multipart/form-data" method="POST">
    <div class="columns">
      <div class="column is-four-fifths">
        <div class="field">
          <label class="label" for="">Titulo</label>
          <div class="control">
            <input type="text" class="input" name="title" placeholder="Titulo del Posts" value="<?=old('title')?>">
          </div>
          <p class="help is-danger"><?= session('errors.title')?></p>
        </div>
        <div class="field">
          <label class="label" for="">Escriba aquí el texto del artículo</label>
          <div class="control">
            <textarea class="textarea" name="body" id="body" placeholder="Escriba aquí su posts">
            <?=old('body')?>
            </textarea>
          </div>
          <p class="help is-danger"><?= session('errors.body')?></p>
        </div>
      </div>
      <div class="column">
        <div class="field">
          <div class="file is-dark has-name is-boxed">
            <label class="file-label">
              <input class="file-input" type="file" name="cover">
              <span class="file-cta">
                <span class="file-icon"> <i class="fas fa-upload"></i></span>
                <span class="file-label"> Suba una imagen </span>
              </span>
              <span class="file-name">Screen_Shot-2017072915.54.25.png</span>
            </label>
          </div>
          <p class="help is-danger"><?= session('errors.cover')?></p>
        </div>
        <div class="field">
          <label for="" class="label">Fecha de publicación</label>
          <div class="control">
            <input type="date" class="input" name="published_at" placeholder="Fecha de publicación" value="<?= old('published_at')?>">
          </div>
          <p class="help is-danger"><?= session('errors.published_at')?></p>
        </div>
        <div class="field">
          <label for="" class="label">Categorias</label>
          <?php if (empty($categories)) : ?>
            <a href="<?=base_url(route_to('categories_create'))?>">Agregar una categoria</a>
          <?php else: ?>
            <?php foreach($categories as $v) : ?>
              <div class="field is-small">
                <label class="checkbox">
                  <input type="checkbox" name="categories[]" value="<?= $v->id?>"
                  <?=
                    old('categories.*')
                    ?
                      (in_array($v->id, old('categories.*'))  ? 'checked' : '')
                    : ''
                  ?>
                  >&nbsp;<?= $v->name?>
                </label>
              </div>
            <?php endforeach; ?>
            <p class="help is-danger"><?= session('errors')['categories.*'] ?? ''?></p>
          <?php endif ?>
          
        </div>
        <div class="field">
          <button type="submit" class="button is-fullwidth is-dark"><i class="fas fa-save"></i>&nbsp;Guardar</button>
        </div>
        <div class="field">
          <button type="reset" class="button is-fullwidth is-danger is-outlined"><i class="fas fa-times"></i>&nbsp;Cancelar</button>
        </div>
      </div>
    </div>
  </form>
<?= $this->endSection(); ?>


<?= $this->section('js') ;?>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea#body',
      width: '100%',
      height: 400,
      menubar:false,
      locale:'es',
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
        'media', 'table', 'emoticons', 'template', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify code | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      content_css: 'css/content.css'
    });
  </script>
<?= $this->endSection(); ?>