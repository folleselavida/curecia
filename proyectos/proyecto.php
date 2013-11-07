<?php

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/proyectos.php");

// if an ID is specified in the query string, use it
if (isset($_GET["nombre"])) {
	$proyecto_nombre = intval($_GET["nombre"]);
	$proyecto = get_project_single($proyecto_nombre);
}

// a $project will only be set and not false if an ID is specified in the query
// string and it corresponds to a real project. If no project is
// set, then redirect to the projects listing page; otherwise, continue
// on and display the Project Details page for that $product
if (empty($proyecto)) {
	header("Location: " . BASE_URL . "proyecto/");
	exit();
}

$section = "shirts";
$pageTitle = $proyecto["nombre"];
include(ROOT_PATH . "inc/header.php"); ?>

		<div class="section page">

			<div class="wrapper">

				<div class="breadcrumb"><a href="<?php echo BASE_URL; ?>proyectos/">Shirts</a> &gt; <?php echo $proyecto["nombre"]; ?></div>

				<div class="shirt-picture">
					<span>
						<img src="<?php echo BASE_URL . $proyecto["img_one"]; ?>" alt="<?php echo $proyecto["nombre"]; ?>">
					</span>
				</div>

				<div class="shirt-details">

					<h1><span class="price">$<?php echo $proyecto["descripcion"]; ?></span> <?php echo $proyecto["nombre"]; ?></h1>

					

					<p class="note-designer">* All shirts are designed by Mike the Frog.</p>

				</div>

			</div>

		</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>