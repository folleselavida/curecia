<?php

/*
 * Returns the four most recent projects, using the order of the elements in the array
 * @return   array           a list of the last four projects in the array;
                             the most recent projects is the last one in the array
 */
function get_projects_recent() {
    $recent = array();
    $all = get_projects_all();

    $total_projects = count($all);
    $position = 0;
    
    foreach($all as $project) {
        $position = $position + 1;
        if ($total_projects - $position < 4) {
            $recent[] = $project;
        }
    }
    return $recent;
}

/*
 * Loops through all the projects, looking for a search term in the project names
 * @param    string    $s    the search term
 * @return   array           a list of the projects that contain the search term in their name
 */
function get_projects_search($s) {
    $results = array();
    $all = get_projects_all();

    foreach($all as $project) {
        if (stripos($project["nombre"],$s) !== false) {
            $results[] = $project;
        }
    }
    return $results;
}

/*
 * Counts the total number of projects
 * @return   int             the total number of projects
 */
function get_projects_count() {
    return count(get_projects_all());
}

/*
 * Returns a specified subset of projects, based on the values received,
 * using the order of the elements in the array .
 * @param    int             the position of the first project in the requested subset 
 * @param    int             the position of the last project in the requested subset 
 * @return   array           the list of projects that correspond to the start and end positions
 */
function get_projects_subset($positionStart, $positionEnd) {
    $subset = array();
    $all = get_projects_all();

    $position = 0;
    foreach($all as $project) {
        $position += 1;
        if ($position >= $positionStart && $position <= $positionEnd) {
            $subset[] = $project;
        }
    }
    return $subset;
}

/*
 * Returns the full list of projects. This function contains the full list of projects,
 * and the other model functions first call this function.
 * @return   array           the full list of projects
 */
function get_projects_all() {

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("SELECT nombre, img_one FROM proyectos ORDER BY nombre ASC");
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $projects = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $projects;
}

/*
 * Returns the full list of projects. This function contains the full list of projects,
 * and the other model functions first call this function.
 * @return   array           the full list of projects
 */
function get_categories_all() {

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("SELECT Categoria FROM categorias ORDER BY Categoria ASC");
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $categories = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $categories;
}



/*
 * Returns the list of projects in a category. This function contains the list of projects in a category,
 * and the other model functions first call this function.
 * @return   array           the list of projects
 */
function get_projects_per_category($c) {

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->prepare("SELECT nombre, descripcion, img_one, img_two 
        	                     FROM proyectos
								 LEFT JOIN categorias
								 ON proyectos.categoria=categorias.ID
								 WHERE categorias.Categoria = ?
								 ORDER BY nombre ASC");

        $results->bindParam(1,$c);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $projects = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $projects;
}

/*
 * Returns an array of project information for the project that matches the name;
 * returns a boolean false if no product matches the name
 * @param    varchar  $name     the name
 * @return   mixed    array    list of project information for the one matching project
 *                    bool     false if no project matches
 */
function get_project_single($name) {

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->prepare("SELECT nombre, descripcion, img_one, img_two FROM proyectos WHERE nombre = ?");
        $results->bindParam(1,$nombre);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $product = $results->fetch(PDO::FETCH_ASSOC);

    return $product;
}

?>