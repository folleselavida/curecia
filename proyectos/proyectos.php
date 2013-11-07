<?php

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/proyectos.php");

	// retrieve current page number from query string; set to 1 if blank
	if (empty($_GET["pg"])) {
		$current_page = 1;
	} else {
		$current_page = $_GET["pg"];
	}
	// set strings like "frog" to 0; remove decimals
	$current_page = intval($current_page);

	$total_projects = get_projects_count();
	$projects_per_page = 8;
	$total_pages = ceil($total_projects / $projects_per_page);

	// redirect too-large page numbers to the last page
	if ($current_page > $total_pages) {
		header("Location: ./?pg=" . $total_pages);
	}

	// redirect too-small page numbers (or strings converted to 0) to the first page
	if ($current_page < 1) {
		header("Location: ./");
	}

	// determine the start and end shirt for the current page; for example, on
	// page 3 with 8 shirts per page, $start and $end would be 17 and 24
	$start = (($current_page - 1) * $projects_per_page) + 1;
	$end = $current_page * $projects_per_page;
	if ($end > $total_projects) {
		$end = $total_projects;
	}

	$projects = get_projects_all();
	$categories = get_categories_all();

?><?php 
$pageTitle = "CURE Y CIA LTDA | Estudio";
$section = "proyectos";
include(ROOT_PATH . 'inc/header.php'); ?>

	<div class="container clearfix proyectos">

		<div class="grid_2 nav-bar-vert">
			<ul class="categorias">
				<?php
					foreach($categories as $category) {
						include(ROOT_PATH . "inc/partial-category-list-view.html.php");
					}
				?>
			</ul>			
		</div>

		<div class="grid_10 omega">
			
			<ul class="grid_12 products">
				<?php
					foreach($projects as $project) {
						include(ROOT_PATH . "inc/partial-project-list-view.html.php");
					}
				?>
			</ul>
			<div class="grid_12 omega">
				<?php include(ROOT_PATH . "inc/partial-list-navigation.html.php"); ?>
			</div>
		</div>
	</div>
