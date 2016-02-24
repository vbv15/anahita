<?php defined('KOOWA') or die; ?>
<!DOCTYPE html>
<html>
	<head>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0" charset="UTF-8">

  	    <?= @render('favicon') ?>
  	    <?= @render('style') ?>
  	</head>
    <body>
    	<h1>test</h1>
    	<?= @template('tmpl/modal') ?>

        <div id="container-system-message" class="container">
        	<?= @render('messages') ?>
        </div>

        <?= @template('tmpl/navbar') ?>

        <div class="container">
        <?= $this->getView()->content; ?>
        </div>

        <?php if ($this->getView()->getParams()->poweredby): ?>
        <div class="container">
        	<div class="row">
        		<div class="span12">
        			<p class="poweredby muted">
        				<em>Powered by <a href="http://www.GetAnahita.com" target="_blank" rel="nofollow">Anahita</a></em>
        			</p>
        		</div>
        	</div>
        </div>
        <?php endif; ?>

        <?= @template('tmpl/js') ?>
        <?= @template('tmpl/analytics') ?>
    </body>
</html>
