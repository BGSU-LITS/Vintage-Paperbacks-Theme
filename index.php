<?php echo head(); ?>

<div>
	<p>Cool Vintage imag'ed..</p>

	<p>Collection Text....</p>
</div>

<h2>Featured Paperbacks</h2>
<div class="row gallery">
<?php
	foreach (get_random_featured_items(4) as $item):
		$files = $item->getFiles();
		$file = $files[0];

		if ($file):
?>
	<div class="span3 item">
		<?php if ($file->hasThumbnail()): ?>
		<?php var_dump($item); ?>
		<a href="<?php echo record_url($item, 'show'); ?>">
			<img src="<?php echo $file->getWebPath('thumbnail'); ?>" alt="Thumbnail" class="shadow-box" />
		</a>
		<?php endif; ?>
	</div>

<?php 
		endif;
	endforeach;
?>
</div>

<?php echo foot(); ?>
