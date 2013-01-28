	<footer>
		<?php echo get_theme_option('footer_text'); ?>
		<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
	</footer>

</section>

</body>
</html>
