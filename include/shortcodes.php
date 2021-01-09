<?php

add_shortcode("display_door_status", "st_getT_states");

function st_getT_states()
{
    $empform_active=intval(get_option('tehran_active'));
    if (!$empform_active){

        $msg=get_option('empform_admin_email');

        return '<h5 style="color: red;"> '.$msg. '</h5>';
    }
    include BSD_FORMTPL_DIR.'follow_form_template.php';
}
add_shortcode("display_door_arak", "st_getT_arak");

function st_getT_arak()
{
    $empform_active=intval(get_option('arak_active'));
    if (!$empform_active){

        $msg=get_option('empform_admin_email');

        return '<h5 style="color: red;"> '.$msg. '</h5>';
    }
    include BSD_FORMTPL_DIR.'follow_form_template_arak.php';
}

