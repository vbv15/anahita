<?php defined('KOOWA') or die('Restricted access'); ?>

<?php $i = 0; $m = 0; ?>
<?php foreach ($components as $component) : ?>			
<tr class="<?php echo 'row'.$m; ?>">
	<td align="center"><?= $i + 1; ?></td>		
	<td align="center"><?= @helper('grid.checkbox', array('row' => $component)); ?></td>	
	<td>
		<a href="<?= 'index.php?option=com_components&view=component&id='.$component->id.'&hidemainmenu=1' ?>">
			<?= @escape($component->getName()); ?>
		</a>
	</td>
	
	<td align="center">
		<?= @helper('grid.order', array('row' => $component, 'url' => 'index.php?option=com_components&view=component&id='.$component->id)); ?>
	</td>
	<td align="center"><?= $component->id; ?></td>				
</tr>
<?php $i = $i + 1; $m = (1 - $m); ?>
<?php endforeach;?>		