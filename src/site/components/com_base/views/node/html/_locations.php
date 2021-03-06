<?php defined('KOOWA') or die; ?>

<?php if(count($locations)) : ?>
<ul class="an-meta inline">
    <li><?= (count($locations) == 1) ? @text('LIB-AN-ENTITY-LOCATION') : @text('LIB-AN-ENTITY-LOCATIONS') ?>: </li>
    <?php foreach($locations as $location) : ?>
    <li>
      <a
        href="<?= @route($location->getURL()) ?>"
        data-longitude="<?= $location->longitude ?>"
        data-latitude="<?= $location->latitude ?>"
        title="<?= htmlspecialchars($location->name) ?>"
      >
      <?= @escape($location->name) ?>
    </a>
  </li>
    <?php endforeach; ?>
</ul>
<?php endif;?>
