<?php


//function bsd_main_page ()
//{
//    global $wpdb, $table_prefix;
//
//    $has_error = false;
//    $success = false;
//    $message = '';
//
//
//    if (isset($_GET['action'])) {
//
//        $action = $_GET['action'];
//
//        switch ($action) {
//
//            case 'delete':
//                $item_id = isset($_GET['item_id']) ? intval($_GET['item_id']) : 0;
//
//                if ($item_id) {
//
//                    $result = $wpdb->delete($table_prefix . 'bsd_form', array('ID' => $item_id), array('%d'));
//                    if ($result) {
//
//                        $success = true;
//                        $message = 'فیلد مورد نظر حذف گردید ‍‍‍‍‍‍‍‍‍';
//
//                    } else {
//
//                        $has_error = true;
//                        $message = 'خطایی رخ داده است لطفا بعا امتحان کنید';
//                        // ba in tabe jomle balaee nemashe dade nmiashavad
//                        wp_redirect('admin.php?page=ticoform_main');
//                    }
//                }
//                break;
//
//            case 'open':
//                break;
//        }
//
//
//    }
//
//    $all_bsdform=$wpdb->get_results("SELECT * FROM  {$table_prefix}bsd_form");//SELECT * FROM `tico_form`
//
//      include BSD_TPL_DIR.'html-inbox-page.php';
//}



function bsd_setting_page (){

    $tabs=array('general'=>'تنظیمات عمومی','setting2'=>'وارد کردن اطلاعات','inbox'=>'اطلاعات ذخیره شده','search'=>'جستجو');
    $current_tab = isset($_GET['tab'])?$_GET['tab']:'general';


    $message_tpl=array(
        '{name}'=>'نام',
        '{email}'=>'ایمیل',
        '{mobile}'=>'موبایل',
    );

  if(isset($_POST['search_submit'])) {

      !empty($_POST['nacode']) ? update_option('nacode', sanitize_text_field($_POST['nacode'])) : update_option('nacode', '');
  }
    if(isset($_POST['general'])) {
        wp_verify_nonce($_POST['bsd_nonce'], 'save_admin_setting') || wp_die('درخواست شما معتبر نیست');

        update_option('arak_active', isset($_POST['arak_active']) ? true : false);
        update_option('tehran_active', isset($_POST['tehran_active']) ? true : false);
        // !empty($_POST['empform_thanks'])? update_option('empform_thanks',sanitize_text_field($_POST['empform_thanks'])):update_option('empform_thanks','');
        update_option('send_email_to_admin_active', isset($_POST['send_email_to_admin_active']) ? 1 : 0);
        !empty($_POST['empform_admin_email']) ? update_option('empform_admin_email', sanitize_text_field($_POST['empform_admin_email'])) : update_option('empform_admin_email', '');
    }
    if(isset($_POST['setting2'])) {
        // wp_verify_nonce($_POST['bsd_nonce'], 'save_admin_setting') || wp_die('درخواست شما معتبر نیست');

        $personalid = sanitize_text_field($_POST['personalid']);
        $ownername = sanitize_text_field($_POST['ownername']);
        $address = sanitize_text_field($_POST['address']);
        $doorcount = intval($_POST['doorcount']);
        $serialnumber = sanitize_text_field($_POST['serialnumber']);
        $citynumber = intval($_POST['citynumber']);
        $buyercode = sanitize_text_field($_POST['buyercode']);
        $installer = sanitize_text_field($_POST['installer']);
        $installercode = sanitize_text_field($_POST['installercode']);
        $installdate = sanitize_text_field($_POST['installdate']);
        $issuedate = sanitize_text_field($_POST['issuedate']);
        $agentname = sanitize_text_field($_POST['agentname']);
        $cityname = sanitize_text_field($_POST['cityname']);
        if ($cityname == 'تهران') {
            $cityid = 1;
        } elseif ($cityname == 'اراک') {
            $cityid = 0;
        }


        global $wpdb, $table_prefix, $prefix;

        $data = array(
            'personalid' => $personalid,
            'ownername' => $ownername,
            'address' => $address,
            'doorcount' => $doorcount,
            'serialnumber' => $serialnumber,
            'citynumber' => $citynumber,
            'buyercode' => $buyercode,
            'installer' => $installer,
            'installercode' => $installercode,
            'installdate' => $installdate,
            'issuedate' => $issuedate,
            'agentname' => $agentname,
            'cityname' => $cityname,
            'cityid' => $cityid

        );

        $all_info = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE serialnumber REGEXP  '[[:<:]]" . $_POST['serialnumber'] . "[[:>:]]'");
        if (count ($all_info)>0 ) {
            echo '<script language="javascript">';
            echo 'alert("اطلاعات ورودی مشکل دارد .")';
            echo '</script>';
        } else {
            $res = $wpdb->insert($table_prefix . 'bsd_form', $data);
            if ($res) {
                echo '<script language="javascript">';
                echo 'alert("اطلاعات ذخیره شد .")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("اطلاعات ذخیره نشد.")';
                echo '</script>';
            }


        }
    }






       include BSD_TPL_DIR.'html-admin-setting.php';

}



function bsd_details_page (){

        include BSD_TPL_DIR.'details-info.php';

}

function bsd_edit_page (){

       include BSD_TPL_DIR.'edit-info.php';

}
