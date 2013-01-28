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
	<?php
		queue_js_file('vintage_paperbacks.min');
		echo head_js();
	?>

	<!--[if lt IE 9]>
	<?php echo js_tag('html5shiv'); ?>
	<![endif]-->
</head>
<body>
	<header id="navigation-bar">
		<h1><?php echo link_to_home_page(option('site_title')); ?></h1>

		<nav class="navigation">
			<?php echo public_nav_main(); ?>
		</nav>

		<div id="search-box">
			<form action="<?php echo url('items/browse'); ?>" method="get">
				<label for="simple-search" class="block embiggen bevel">Search</label>
				<input type="text" name="search" id="simple-search" value="<?php echo input_get_value('search'); ?>" class="input medium shadow" />
				<input type="submit" value="Go!" class="button" />
			</form>
		</div>
	</header>

	<section id="content">
		<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
