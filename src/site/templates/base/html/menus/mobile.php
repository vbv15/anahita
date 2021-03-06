<?php defined('KOOWA') or die;?>

<?php
$viewer = get_viewer();
$components = $this->getService('com://site/people.template.helper')->viewerMenuLinks($viewer);
?>

<ul class="nav">
<?php if ($viewer->guest()): ?>
	<li>
		<?php $return = base64UrlEncode(KRequest::url()); ?>
		<a href="<?= @route('option=com_people&view=session&return='.$return) ?>">
		<?= @text('LIB-AN-ACTION-LOGIN') ?>
		</a>
	</li>
<?php else : ?>
	<li>
		<a href="<?=@route($viewer->getURL())?>">
		<?= @avatar(get_viewer(), 'square', false) ?>
		</a>
	</li>
	<li>
		<a href="<?= @route($viewer->getURL().'&get=graph'); ?>">
		<?= @text('TMPL-MENU-ITEM-VIEWER-SOCIALGRAPH') ?>
		</a>
	</li>

<?php if (KService::get('koowa:loader')->loadClass('ComGroupsDomainEntityGroup')): ?>
    <li class="divider"></li>
    <li>
    	<a href="<?= @route('option=com_groups&view=groups&oid='.$viewer->uniqueAlias.'&filter=following') ?>">
        <?= @text('TMPL-MENU-ITEM-VIEWER-GROUPS') ?>
        </a>
    </li>
 	<?php endif; ?>

	<?php if (count($components)): ?>
	<li class="divider"></li>
    <?php foreach ($components as $component): ?>
    <li>
    	<a href="<?= @route($component->url) ?>">
    	<?= $component->title ?>
    	</a>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
    <li class="divider"></li>
	<li>
		<a data-trigger="PostLink" href="<?= @route('option=com_people&view=session&action=delete') ?>">
        <?= @text('LIB-AN-ACTION-LOGOUT') ?>
		</a>
	</li>
<?php endif; ?>
</ul>
