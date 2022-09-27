<?= $this->extend('Front/layout/main') ?>

<?= $this->section('title') ?>
<?= $post->title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
  <div class="content">
    <img src="<?=$post->getLink()?>" alt="" style="width: 100%;height: 300px;object-fit:cover;">
    <h1><?=$post->title?></h1>
    <h4>Por:&nbsp;<?= $post->author->getFullName() ?></h4>
    <p>Publicado:&nbsp;<?= $post->published_at->humanize() ?></p>
    <div class="tags are-medium">
      <?php foreach ($post->getCategories() as $i) : ?>
        <span class="tag"><i class="fas fa-tag"></i>&nbsp;<?= $i->name?></span>
      <?php endforeach ?>
    </div>
    <p><?=$post->body?></p>
  </div>
</section>

<?= $this->endSection() ?>