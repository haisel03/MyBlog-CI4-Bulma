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
                    <div class="media-content">
                      <p class="title is-5"><?= $v->title ?></p>
                      <p class="subtitle is-7"><?= $v->author->getFullName() ?></p>
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
  </section>