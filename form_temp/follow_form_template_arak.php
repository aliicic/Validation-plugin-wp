

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<div id="employment_wrap">
    <form id="employment_form" action="" method="POST">
        <h6 style="display: block; text-align: center;margin-bottom: 80px; ">لطفا اطلاعات خواسته شده را وارد نمایید.</h6>

        <div class="part1">
            <P>کد ملی:</P>

            <input type="text"

                   id="nationalcode"
                   title="بطف فرمت صحجج زا وارد کنید "
                   pattern="[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]" name="nacode"
                   required
                   oninvalid="setCustomValidity('لطفا کد ملی را وارد کنید')"

                   oninput="setCustomValidity('')">
            <script>//IN GHESMAT BARAYE CUSTOM KARDAN ERROR POR KARDAN FIED AST
                var input = document.getElementById('nationalcode');
                input.oninvalid = function (event) {
                    event.target.setCustomValidity('لطفا یک فرمت صحیح کد ملی راوارد کن');
                }
            </script>

        </div>
        <div class="part2">
            <p>شماره سریال:</p>
            <span><input type="text" name="serialnum"></span>

        </div>


        <p style="text-align: center ; ">
            <?php   wp_nonce_field('empform_submit','empsubmit_none'); ?>

            <input type="submit"  name="empform_submit" value="جتسجو">

        </p>
    </form>


    <?php


    if (isset($_POST['empform_submit'])) {
        $message = "";

        wp_verify_nonce($_POST['empsubmit_none'],'empform_submit') || wp_die('درخواست شما معتبر نیست');

        global $wpdb, $table_prefix;

        $send_email_to_admin_active=intval(get_option('send_email_to_admin_active'));
        if ($send_email_to_admin_active){
            $msg = "hello baby this is just a test";
            $msg = wordwrap($msg,70);
            mail("aliaghakhani911@gmail.com","My subject",$msg);
        }



        // in ghesmat baraye test data base neeshte shode ast
        // $states0 = $wpdb->get_results( "SELECT title FROM " . $wpdb->prefix . "states WHERE id='" . $_POST['states']  . "'" );
        // '<br>'.var_dump($states0).'</br>';
        //'<br>'.var_dump($states0->title).'</br>';
        //foreach ( $states0 as $item ) {
        //   echo '<br>'. $item->title.'</br>';
        // }
        /////////////////////////


        $test=0;
       // $all_info = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE buyercode='" . $_POST['nacode']  . "'" );
        // echo '<br>'.$states1->title.'</br>';
       $all_info = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE cityid='" . $test . "' AND buyercode='" . $_POST['nacode'] . "' AND serialnumber REGEXP  '[[:<:]]" . $_POST['serialnum'] ."[[:>:]]'");
        //        //echo $citeis1->title;

        ?>

        <?php if ( count( $all_info ) > 0 ) : ?>
            <?php foreach ( $all_info as $item ): ?>
                <div>
                    <div>کد:<?php echo $item->personalid;?></div>
                    <div>نام مالک:<?php echo $item->ownername;?></div>
                    <div> آدرس پروژه:<?php echo $item->address;?></div>
                    <div> تعداد درب ها:<?php echo $item->doorcount;?></div>
                    <div>شماره سریال:<?php echo $item->serialnumber; ?></div>
                    <div> شماره شهرسازی:<?php echo $item->citynumber; ?></div>
                    <div>کد ملی مالک:<?php echo $item->buyercode; ?></div>
                    <div>نام نصاب:<?php echo $item->installer; ?></div>
                    <div>کد ملی نصاب:<?php echo $item->installercode; ?></div>
                    <div>تاریخ نصب :<?php echo $item->installdate; ?></div>
                    <div>تاریخ صدور:<?php echo $item->issuedate; ?></div>
                    <div>نام نماینده :<?php echo $item->agentname; ?></div>
                    <div> نام شهر :<?php echo $item->cityname; ?></div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <tr class="no-items">
                <td class="colspanchnage" colspan="9"><?php _e( 'موردی یافن نشد!' ); ?></td>
            </tr>
        <?php endif; ?>
        <?php






//    $fixphone = intval($_POST['fixphone']);
//    $email = sanitize_email($_POST['email']);

        global $wpdb, $table_prefix, $prefix;

//    $data = array(
//        'name' => $firstname,
//        'familyname' => $familyname,
//        'fathername' => $fathername,
//        'workexnumber' => $workexnumber,
//        'birthday' => $birthday,
//        'nacode' => $nacode,
//        'grade' => $grade,
//        'sex' => $sex,
//        'state' => $states,
//        'city' => $cities,
//        'address' => $address,
//        'mastatus' => $mastatus,
//        'sostatus' => $sostatus,
//        'mobile' => $mobile,
//        'fixphone' => $fixphone,
//        'email' => $email
//    );

//    $wpdb->insert($table_prefix . 'tico_form', $data);


//        $alrt= get_option('empform_thanks');
//        echo '<script language="javascript">';
//        echo 'alert("'.$alrt.'")';
//        echo '</script>';
    }


    ?>




</div>
