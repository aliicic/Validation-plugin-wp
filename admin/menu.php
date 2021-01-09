<?php

add_action('admin_menu','bsd_admin_menu');


function bsd_admin_menu() {
    $main=add_menu_page('سامانه استعلام',
        'سامانه استعلام',
        'manage_options',
        'bsd_setting',
        'bsd_setting_page',BSD_IMG_URL.'iconform.png');

    $setting = add_submenu_page('bsd_main',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'bsd_setting','bsd_setting_page',BSD_IMG_URL.'iconform.png');


    $setting = add_submenu_page('bsd_main',
        'نمایش اطلاعات',
        'h',
        'manage_options',
        'bsd_details',
        'bsd_details_page');

    $setting = add_submenu_page('bsd_main',
        'ویرایش اطلاعات',
        'edit',
        'manage_options',
        'bsd_edit',
        'bsd_edit_page');

}
