<?php
	$pagination = pagination_links();
	$page_title = isset($_GET['search']) && ! empty($_GET['search']) ? "Search - {$_GET['search']}" : "Browse";
?>
<?php echo head(array('title' => $page_title)); ?>

	<h1 class="headline"><?php echo __($page_title); ?> <small><?php echo __('(%s total)', $total_results); ?></small></h1>

	<nav id="secondary-nav">
		<?php echo public_nav_items(); ?>
	</nav>

	<?php echo $pagination; ?>

	<div class="browse items">
	<?php foreach (loop('items') as $item): ?>
		<div class="item row">
			<div class="span3 item-image">
				<?php if (metadata('item', 'has thumbnail')): ?>
					<?php echo link_to_item(item_image('thumbnail', array('class' => 'shadow'))); ?>
				<?php endif; ?>
			</div>

			<div class="span9 item-metadata">
				<h3 class="no-margin"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>

				<p class="headline author">By: <?php echo metadata('item', array('Dublin Core', 'Creator')); ?></p>

				<?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
				<div class="item-description">
					<p><?php echo $text; ?></p>
				</div>
				<?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
				<div class="item-description">
					<?php echo $description; ?>
				</div>
				<?php endif; ?>

				<?php if (metadata('item', 'has tags')): ?>
				<div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
					<?php echo tag_string('item'); ?></p>
				</div>
				<?php endif; ?>

				<?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>

	<?php echo $pagination; ?>

	<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>