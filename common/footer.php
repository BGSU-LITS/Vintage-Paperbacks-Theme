			</section>

		</div>
		<div class="row">
			<footer class="shadow">
				<div class="text-right outline pad">
					<small><?php echo get_theme_option('footer_text'); ?></small>
				</div>

				<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
			</footer>
		</div>

	</div>

<script>/* Away we go! */ vintagePaperbacks.init();</script>

</body>
</html>
