<?php


add_action( 'wp_enqueue_scripts', 'bsd_load_user_assets' );


function bsd_load_user_assets() {

    wp_register_style( 'front_style', BSD_CSS_URL . 'front_style.css' );
    wp_enqueue_style( 'front_style' );


}

function inbox_style1(){

    wp_register_style( 'inbox_form_style1', BSD_CSS_URL . 'inbox_form_style.css' );
    wp_enqueue_style( 'inbox_form_style1' );
}

add_action( 'wp_enqueue_scripts', 'inbox_style1' );