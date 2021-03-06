<?php defined('KOOWA') or die('Restricted access') ?>

<div class="row">
	<div class="span8">
	<?= @helper('ui.header', array()) ?>
	<?= @template('topic') ?>
	<?= @helper('ui.comments', $topic) ?>
	</div>

	<?php if ($actor->authorize('administration')): ?>
	<div class="span4 visible-desktop">
			<h4 class="block-title">
			    <?= @text('COM-TOPICS-TOPIC-PRIVACY') ?>
			</h4>
	    <div class="block-content">
	        <?= @helper('ui.privacy', $topic) ?>
	    </div>

			<?php if(count($topic->locations) || $topic->authorize('edit')): ?>
			<h4 class="block-title">
				<?= @text('LIB-AN-ENTITY-LOCATIONS') ?>
			</h4>

			<div class="block-content">
			<?= @location($topic) ?>
			</div>
			<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
