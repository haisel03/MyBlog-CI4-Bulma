<nav class="pagination is-small" aria-label="<?= lang('Pager.pageNavigation') ?>">
  <?php if ($pager->hasPreviousPage()) : ?>
    <a class="pagination-previous" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
      <span aria-hidden="true"><i class="fas fa-chevron-left"></i>&nbsp;<?= lang('Pager.previous') ?></span>
    </a>
    <?php endif ?>
    <?php if ($pager->hasNextPage()) : ?>
      <a class="pagination-next" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
        <span aria-hidden="true"><?= lang('Pager.next') ?>&nbsp;<i class="fas fa-chevron-right"></i></span>
      </a>
    <?php endif ?>
  <ul class="pagination-list">
    <?php foreach ($pager->links() as $link) : ?>
      <a class="pagination-link <?= $link['active'] ? 'is-current' : '' ?>" href="<?= $link['uri'] ?>">
        <?= $link['title'] ?>
      </a>
    <?php endforeach ?>
  </ul>
</nav>