<?php
/*
Plugin Name: سامانه استعلام
Plugin URI: https://negarehagency.com/
Description:  سامانه استعلام
Version: 1.0.0
Author:علی آقاخانی
Author URI: mypro.ticotech.ir
*/



defined( 'ABSPATH' ) || exit( 'Hi there!  Im just a plugin, not much I can do when called directly' );

define( 'BSD_DIR', plugin_dir_path( __FILE__ ) );
define( 'BSD_URL', plugin_dir_url( __FILE__ ) );


define( 'BSD_ADMIN_DIR', trailingslashit( BSD_DIR . 'admin' ) );
define( 'BSD_CSS_URL', trailingslashit( BSD_URL . 'assets/css' ) );
define( 'BSD_IMG_URL', trailingslashit( BSD_URL . 'assets/img' ) );
define( 'BSD_TPL_DIR', trailingslashit( BSD_DIR . 'template' ) );
define( 'BSD_FORMTPL_DIR', trailingslashit( BSD_DIR . 'form_temp' ) );
define( 'BSD_INC_DIR', trailingslashit( BSD_DIR . 'include' ) );


include BSD_INC_DIR.'frontend.php';
include BSD_INC_DIR.'shortcodes.php';

if(is_admin())
{

    require BSD_ADMIN_DIR.'menu.php';
    require BSD_ADMIN_DIR.'page.php';

}