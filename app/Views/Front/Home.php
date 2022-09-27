<?= $this->extend('Front/layout/main') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
  <section class="section">
    <div class="columns is-multiline">
      <?php foreach ($posts as $v) : ?>
          <a href="<?= $v->getLinkArticle()?>">
            <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="<?= $v->getLink() ?>" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                      <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <p class="title is-4"><?= $v->title ?></p>
                      <p class="subtitle is-6"><?= $v->author->getFullName() ?></p>
                    </div>
                  </div>
                  <div class="content">
                    <?= character_limiter(strip_tags($v->body), 10); ?>
                    <br>
                    <?php if (!empty($v->getCategories())) : ?>
                      <?php foreach ($v->getCategories() as $var) : ?>
                        <a href="#">#<?= $var->name ?></a>
                      <?php endforeach ?>
                    <?php endif ?>
                    <br>
                    <time datetime="2016-1-1"><?= $v->published_at->humanize() ?></time>
                  </div>
                </div>
              </div>
            </div>
          </a>
      <?php endforeach ?>
    </div>
    <?= $pager->links() ?>
  </section>
  <section class="section">
    <h1>Artículos de CodeIgniter</h1>
    <?= view_cell('\App\Controllers\Front\Home::filter', ['category' => 'CodeIgniter', 'limit' => 4]) ?>
  </section>
</div>
<?= $this->endSection() ?>
