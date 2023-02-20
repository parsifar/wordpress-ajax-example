<?php

/**
 * The template for displaying the homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_AJAX
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container p-5 my-5 bg-light">
        <div class="row">
            <div class="col">
                <button id="delete-post-btn" class="btn btn-lg btn-danger">DELETE POST</button>

                <div id="results" class="py-5 display-4"></div>
            </div>
        </div>

    </div>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
