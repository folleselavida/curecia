<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?><li class="grid_3">
        <a href="/proyectos/<?php echo $project["nombre"]; ?>/">
            <img src="<?php echo BASE_URL . $project["img_one"]; ?>" alt="<?php echo $project['nombre']; ?>">
            <p><?php echo $project["nombre"]; ?></p>
        </a>
    </li>