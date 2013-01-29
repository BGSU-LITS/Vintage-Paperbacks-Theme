<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')))); ?>

<?php $catalog_link = metadata('item', array('Dublin Core', 'Identifier')); ?>

	<h1 class="headline"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

	<?php if (metadata('item', 'has files')): ?>

	<div class="book-covers">
		<h2 class="headline">Cover Images</h2>
		<ul class="gallery plain">
		<?php foreach($item->getFiles() as $file): ?>
			<li>
				<a href="<?php echo $file->getWebPath('fullsize'); ?>" rel="gallery1">
					<img src="<?php echo $file->getWebPath('thumbnail'); ?>" class="shadow" />
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

	<?php if($catalog_link !== null): ?>
	<div class="catalog-link pull-up">
		<strong>BGSU Catalog Record</strong>: <a href="<?php echo $catalog_link; ?>"><?php echo $catalog_link; ?></a>
	</div>
	<?php endif; ?>


	<ul class="metadata plain">
		<li class="metdata-row">
			<h4 class="metadata-label">Title</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></div>
		</li>
		<li class="metdata-row">
			<h4 class="metadata-label">Author</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></div>
		</li>
		<li class="metdata-row">
			<h4 class="metadata-label">Artist</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Contributor')); ?></div>
		</li>
		<li class="metdata-row">
			<h4 class="metadata-label">Date</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Date')); ?></div>
		</li>
		<li class="metdata-row">
			<h4 class="metadata-label">Front Cover Blurb</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Description')); ?></div>
		</li>
		<li class="metdata-row">
			<h4 class="metadata-label">Genre</h4>
			<div class="metadata-value"><?php echo metadata('item', array('Dublin Core', 'Type')); ?></div>
		</li>
	</ul>

	<?php if (metadata('item', 'has_tags')): ?>
	<ul class="metadata plain">
		<li class="metadata-row">
			<h4 class="metadata-label"><?php echo __('Tags'); ?></h4>
			<div class="metadata-value"><?php echo tag_string($item); ?></div>
		</li>
	</ul>
	<?php endif;?>

	<?php echo fire_plugin_hook('append_to_items_show', array('view' => $this, 'item' => $item)); ?>

	<div class="pagination">
		<ul class="plain navigation">
			<li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
			<li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
		</ul>
	</div>

<script>/** Gallery Init */ vintagePaperbacks.gallery('.gallery > li > a');</script>

<?php echo foot(); ?>