<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
	<title><?php echo option('site_title'); ?><?php if(isset($title)){ echo " » {$title}"; } ?></title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="<?php echo get_theme_option('keywords'); ?>" />
	<meta name="description" content="<?php echo option('description'); ?>" />
	<meta name="author" content="<?php echo option('author'); ?>" />

	<?php
		// This fuels my OCD. The auto_discovery_link_tags should take a separator argument
		$tags = array_filter(explode(" />", auto_discovery_link_tags()));
		echo join(" />\n\t", $tags). " />";
	?>

	<?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

	<!-- CSS -->
	<?php
		queue_css_file('style');
		echo head_css();
	?>

	<!-- JS -->
	<?php echo head_js(false); ?>

</head>
<body>
	<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

	<div class="container">
		<div class="row">
			<header class="span3">
				<div class="text-center push-down">
				<?php echo link_to_home_page('<img src="'.img('logo.svg').'" alt="Logo">'); ?>
				</div>

				<div class="shadow push-down double">
					<div id="search-box" class="red-velvet">
						<form action="<?php echo url('items/browse'); ?>" method="get">
							<label for="simple-search" class="hidden">Search</label>
							<input type="text" name="search" id="simple-search" value="<?php echo input_get_value('search'); ?>" class="input" />
							<input type="submit" value="Search" class="button" />
						</form>
					</div>

					<nav id="site-nav">
						<?php echo public_nav_main(); ?>
					</nav>
				</div>
			</header>

			<section id="content" class="span9">
