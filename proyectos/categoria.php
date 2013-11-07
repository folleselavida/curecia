<?php

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/proyectos.php");

// if an ID is specified in the query string, use it
if (isset($_GET["nombre"])) {
	$proyecto_nombre = $_GET["nombre"];
	$projects = get_projects_per_category($proyecto_nombre);
	$categories = get_categories_all();
} 

// a $project will only be set and not false if an ID is specified in the query
// string and it corresponds to a real project. If no project is
// set, then redirect to the projects listing page; otherwise, continue
// on and display the Project Details page for that $product
if (empty($projects)) {
	header("Location: " . BASE_URL . "proyectos/");
	exit();
}

$section = "shirts";
$pageTitle = $proyecto_nombre;
include(ROOT_PATH . "inc/header.php"); ?>

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

	</div>
</div>
