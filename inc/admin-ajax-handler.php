<?php

// load a javascript on the front-end (all pages)
add_action("wp_enqueue_scripts", "load_front_end_script");

function load_front_end_script()
{
    // enqueue the script
    wp_enqueue_script("my-script", get_stylesheet_directory_uri() . "/js/my-script.js", ['jquery'], '1.0.0', true);

    // create a nonce for a specific action
    $my_nonce = wp_create_nonce("delete_post_action");

    // get the admin ajax url
    $admin_ajax_url = admin_url("admin-ajax.php");

    // localize the JS and send the nonce and admin-ajax url to it
    wp_localize_script("my-script", "localized_object", array("my-nonce" => $my_nonce, "ajax-url" => $admin_ajax_url));
}


// ajax call handler
add_action('wp_ajax_nopriv_delete_my_post', 'handle_delete_request');
add_action('wp_ajax_delete_my_post', 'handle_delete_request');

function handle_delete_request()
{
    // if the nonce isn't set or is wrong, send an error
    if (!isset($_POST["my_nonce"]) || !check_ajax_referer("delete_post_action", "my_nonce")) {
        wp_send_json_error(array('message' => 'something went wrong'));
    } else {
        // if the nonce is correct then proceed with the request
        wp_send_json_success(array('message' => 'all good'));
    }

    die();
}
