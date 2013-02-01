<?php
	$pagination = pagination_links();

	$page_title = "Browse";

	if (array_key_exists('tag', $_GET))
	{
		$page_title .= " Tags: {$_GET['tag']}";
	}

	if (array_key_exists('search', $_GET))
	{
		$page_title = "Search Results: {$_GET['search']}";
	}
?>
<?php echo head(array('title' => $page_title)); ?>

	<h1 class="headline"><?php echo __($page_title); ?> <small><?php echo __('(%s total)', $total_results); ?></small></h1>

	<nav id="secondary-nav">
		<?php echo public_nav_items(); ?>
	</nav>

	<?php echo $pagination; ?>

	<div class="browse items">
	<?php foreach (loop('items') as $item): ?>
		<div class="item">
			<div class="item-image">
				<?php if (metadata('item', 'has thumbnail')): ?>
					<?php echo link_to_item(item_image('thumbnail', array('class' => 'shadow'))); ?>
				<?php endif; ?>
			</div>

			<div class="item-metadata">
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
				<div class="hTagcloud">
					<h4><?php echo __('Tags'); ?>:</h4>
					<ul class="plain tags">
						<?php
						foreach ($item->Tags as $tag):
							$data = array('tag' => $tag->name);
							if (array_key_exists('collection', $_GET))
							{
								$data['collection'] = $_GET['collection'];
							}

							$url = url('items/browse', $data);
						?>
						<li class="tag"><a href="<?php echo $url; ?>"><?php echo $tag->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
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