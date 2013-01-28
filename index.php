<?php echo head(); ?>

<div class="row search hero shadow-box">
	<div class="span6 hero-image">
		<h1>[Cool Vintage Image]</h1>
	</div>
	<div class="span6 hero-search">
		<form action="<?php echo url('items/browse'); ?>" method="get" class="embiggen">
			<label for="simple-search" class="block"><strong>Search</strong></label>
			<input type="text" name="search" id="simple-search" class="input long push-down" />
			<input type="submit" value="Go!" class="button alternate" />
		</form>
	</div>
</div>
</div>

<h2>Featured Paperbacks</h2>
<div class="row gallery">
<?php
	foreach (get_random_featured_items(4) as $item):
		$files = $item->getFiles();
		$file = $files[0];
?>
	<div class="span3 item">
		<?php if ($file->hasThumbnail()): ?>
		<a href="<?php echo record_url($item, 'show'); ?>">
			<img src="<?php echo $file->getWebPath('thumbnail'); ?>" alt="Thumbnail" class="shadow-box" />
		</a>
		<?php endif; ?>
	</div>

<?php endforeach; ?>
</div>

<?php echo foot(); ?>
