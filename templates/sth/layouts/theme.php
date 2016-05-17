<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">

	<div class="uk-container uk-container-center uk-page-wrapper">
		<div class="uk-header-wrapper">
			<div class="uk-container-padding">
				<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
				<div class="tm-toolbar uk-clearfix">

					<?php if ($this['widgets']->count('toolbar-l')) : ?>
					<div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
					<?php endif; ?>

					<?php if ($this['widgets']->count('toolbar-r')) : ?>
					<div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
					<?php endif; ?>

				</div>
				<?php endif; ?>

				<?php if ($this['widgets']->count('logo + headerbar-center + headerbar-right')) : ?>
				<div class="tm-headerbar uk-clearfix">
				
					<div class="uk-float-left">
						<?php if ($this['widgets']->count('logo')) : ?>
						<a class="tm-logo uk-inline-block uk-text-middle" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
						<?php endif; ?>
						<div class="uk-headerbar-center uk-h3 uk-text-italic uk-text-georgia uk-text-muted uk-inline-block uk-text-middle">
							<?php echo $this['widgets']->render('headerbar-center'); ?>
						</div>
					</div>
					<div class="uk-headerbar-cart uk-float-right">
						<?php echo $this['widgets']->render('headerbar-cart'); ?>
					</div>
					<div class="uk-headerbar-right uk-float-right">
						<?php echo $this['widgets']->render('headerbar-right'); ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($this['widgets']->count('menu + search')) : ?>
		<nav class="tm-navbar uk-navbar">
			<div class="uk-container-padding">
				<?php if ($this['widgets']->count('menu')) : ?>
				<?php echo $this['widgets']->render('menu'); ?>
				<?php endif; ?>

				<?php if ($this['widgets']->count('offcanvas')) : ?>
				<a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
				<?php endif; ?>

				<?php if ($this['widgets']->count('search')) : ?>
				<div class="uk-navbar-flip">
					<div class="uk-navbar-content"><?php echo $this['widgets']->render('search'); ?></div>
				</div>
				<?php endif; ?>

				<?php if ($this['widgets']->count('logo-small')) : ?>
				<div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
				<?php endif; ?>
			</div>
		</nav>
		<?php endif; ?>

		<?php if ($this['widgets']->count('slider')) : ?>
			<div class="uk-slider-wrapper">
				<?php echo $this['widgets']->render('slider'); ?>
			</div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('top-a')) : ?>
		<div class="uk-container-padding">
			<section id="tm-top-a" class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
		</div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('top-b')) : ?>
		<div class="uk-container-padding">
			<section id="tm-top-b" class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
		</div>
		<?php endif; ?>		
		
		<?php if ($this['widgets']->count('top-c')) : ?>
			<section class="tm-top-c-wrapper">
				<div class="uk-container-padding tm-top-c uk-grid uk-grid-collapse">
					<?php echo $this['widgets']->render('top-c'); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
		<div class="uk-container-padding uk-middle-wrapper">
			<?php if ($this['widgets']->count('breadcrumbs')) : ?>
				<?php echo $this['widgets']->render('breadcrumbs'); ?>
			<?php endif; ?>
			<div id="tm-middle" class="tm-middle uk-position-relative uk-grid" data-uk-grid-match data-uk-grid-margin>

				<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
				<div class="<?php echo $columns['main']['class'] ?>">

					<?php if ($this['widgets']->count('main-top')) : ?>
					<section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
					<?php endif; ?>

					<?php if ($this['config']->get('system_output', true)) : ?>
					<main id="tm-content" class="tm-content">

						<?php echo $this['template']->render('content'); ?>

					</main>
					<?php endif; ?>

					<?php if ($this['widgets']->count('main-bottom')) : ?>
					<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
					<?php endif; ?>

				</div>
				<?php endif; ?>

				<?php foreach($columns as $name => &$column) : ?>
				<?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
				<aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
				<?php endif ?>
				<?php endforeach ?>

			</div>
		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('circle-slider')) : ?>
			<div class="uk-circle-slider">
				<?php echo $this['widgets']->render('circle-slider'); ?>
			</div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('bottom-a')) : ?>
		<div class="uk-container-padding uk-background-gradient uk-shadow-top">
			<section id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-b')) : ?>
		<div class="uk-container-padding">
			<section id="tm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('map')) : ?>
			<div class="uk-map uk-background-gradient uk-container-padding">
				<?php echo $this['widgets']->render('map'); ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ($this['widgets']->count('footer + debug + footer-logo') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
		<div class="uk-container uk-container-center">
			<footer id="tm-footer" class="tm-footer uk-text-left uk-margin-remove">
				<div class="uk-container-padding uk-grid">
					<?php if ($this['config']->get('totop_scroller', true)) : ?>
					<a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
					<?php endif; ?>
					<div class="uk-width-3-4">
						<div class="uk-footer-logo uk-inline-block uk-text-middle">
							<a class="uk-inline-block" href="/"><?php echo $this['widgets']->render('footer-logo'); ?></a>
						</div>
						<div class="uk-footer-block uk-inline-block uk-text-middle uk-text-contrast uk-text-small uk-margin-large-left">
							<?php echo $this['widgets']->render('footer'); ?>
						</div>
						<?php
							$this->output('warp_branding');
							echo $this['widgets']->render('debug');
						?>
					</div>
					<div class="uk-medialine-copyrates uk-width-1-4 uk-margin-large-top uk-text-right">
						<div class="uk-medialine-copyrate-text uk-inline-block uk-text-contrast"><?php echo JText::_("TPL_COPYRIGHTS_TEXT"); ?></div>
						<div class="uk-medialine-copyrate-link uk-inline-block"><a class="uk-title-bordered" title="<?php echo JText::_("TPL_COPYRIGHTS_TEXT")." ".JText::_("TPL_COPYRIGHTS_LINK"); ?>" target="_blank" href="http://www.medialine.by"><?php echo JText::_("TPL_COPYRIGHTS_LINK"); ?></a></div>
					</div>
				</div>
			</footer>
		</div>
	<?php endif; ?>

	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>
	
	<?php if ($this['widgets']->count('metrics')) : ?>
		<div class="uk-metrics">
			<?php echo $this['widgets']->render('metrics'); ?>
		</div>
	<?php endif; ?>
</body>
</html>