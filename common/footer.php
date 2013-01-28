			</section>

		</div>
		<div class="row">
			<footer>
				<div class="text-right">
					<small><?php echo get_theme_option('footer_text'); ?></small>
				</div>

				<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
			</footer>
		</div>

	</div>

</body>
</html>
