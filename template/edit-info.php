<div class="wrap">

    <h2><?php


        _e('نمایش جزئیات','BSD');

        ?></h2>
    <h2><?php
        global $wpdb;
        $item_id = isset($_GET['item_id'])?intval($_GET['item_id']):0;// chera in item age dar switch case neveshge moshod natije nmidad ?
        $details = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE id='" . $item_id  . "'" );
        foreach ( $details as $item) {

            echo $item->familyname;
            echo $item->email.'</br>';
        }


        if (isset($_POST['save-edit'])) {

            ?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php


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
            if($cityname=='تهران'){
                $cityid=1;
            }elseif ($cityname=='اراک'){
                $cityid=0;
            }


            global $wpdb, $table_prefix, $prefix;

            $data = array(
                'personalid' => $personalid,
                'ownername' => $ownername,
                'address' => $address,
                'doorcount'=>$doorcount,
                'serialnumber' => $serialnumber,
                'citynumber' => $citynumber,
                'buyercode' => $buyercode,
                'installer' => $installer,
                'installercode' => $installercode,
                'installdate' => $installdate,
                'issuedate' => $issuedate,
                'agentname' => $agentname,
                'cityname' => $cityname,
                'cityid'=>$cityid,
            );
            $message = "";

            //  $res=$wpdb->update($table_prefix . "bsd_form WHERE ID='" . $item_id  . "'", $data);

            // $wpdb->update('wp_bsd_form', $data);

            $all_info = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE serialnumber REGEXP  '[[:<:]]" . $_POST['serialnumber'] . "[[:>:]]'");
            if (count ($all_info)>0 ) {
                echo '<script language="javascript">';
                echo 'alert("اطلاعات ورودی مشکل دارد .")';
                echo '</script>';
            } else {

                $wpdb->query($wpdb->prepare("UPDATE wp_bsd_form SET personalid='$personalid',ownername='$ownername',address='$address',doorcount='$doorcount',serialnumber='$serialnumber',citynumber='$citynumber',buyercode='$buyercode',installer='$installer',installercode='$installercode',installdate='$installdate',issuedate='$issuedate',agentname='$agentname',cityname='$cityname',cityid='$cityid'WHERE id=$item_id"));


                wp_redirect('admin.php?page=bsd_setting&tab=inbox&flag=okay');

            }
//        if($res>0) {
//hvh;
//            echo '<script language="javascript">';
//
//            echo 'alert("تمامه")';
//
//            echo '</script>';
//        }
//        else{
//            echo '<script language="javascript">';
//
//            echo 'alert("نامتماه")';
//
//            echo '</script>';
//        }



        }








        ?>
        <style>
            td.entry-view-field-name {
                font-weight: 700;
                background-color: #EAF2FA;
                border-bottom: 1px solid #FFF;
                line-height: 1.5;
                padding: 7px;
            }
        </style>

    </h2>
    <div id="inbox_wrap">
        <form action="" method="post">
        <table cellspacing="0" class=" widefat fixed entry-detail-view">
            <thead>
            <tr>
                <th id="details">
                    مشخصات کامل
                </th>

                <th style="width:auto; font-size:10px; text-align: left;">
                  <a href="">  <input type="submit" id="" name="save-edit" value="ذخیره اطلاعات" class="button">&nbsp;&nbsp;

                </th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td colspan="2"  class="entry-view-field-name" >کد</td>
            </tr>
            <tr class="fielddesc">
                <td><input required
                           oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                           oninput="this.setCustomValidity('')"
                           type="text" name="personalid" id="" style="width: 100%" value="<?php    if (isset($_POST['save-edit'])) {echo $personalid;}else{ echo $item->personalid;} ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام مالک</td>
            </tr>
            <tr class="fielddesc">
                <td><input required
                           oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                           oninput="this.setCustomValidity('')"
                           type="text" name="ownername" id="" style="width: 100%" value="<?php echo $item->ownername; ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">آدرس</td>
            </tr>
            <tr class="fielddesc">

                <td><input
                        required
                        oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                        oninput="this.setCustomValidity('')"
                        type="text" name="address" id="" style="width: 100%" value="<?php echo $item->address; ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تعداد درب ها</td>
            </tr>
            <tr class="fielddesc">

                <td><input required
                           oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                           oninput="this.setCustomValidity('')"

                           type="text" name="doorcount" id="" style="width: 100%" value="<?php echo $item->doorcount; ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">شماره سریال ها </td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"
                            placeholder=" حتما با این فرمت وارد کنید : 12345,12334,1234"
                            type="text" name="serialnumber" id="" style="width: 100%" value=" <?php echo $item->serialnumber;?> "> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"    class="entry-view-field-name">شماره شهرسازی</td>
            </tr>
            <tr class="fielddesc">

                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"
                            type="text" name="citynumber" id="" style="width: 100%" value="<?php echo $item->citynumber; ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">کد ملی خریدار</td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"
                            type="text" name="buyercode" id="" style="width: 100%" value="<?php echo $item->buyercode; ?> "> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام نصاب</td>
            </tr>
            <tr class="fielddesc">
                <td><input   required
                             oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                             oninput="this.setCustomValidity('')"
                             type="text" name="installer" id="" style="width: 100%" value="<?php echo $item->installer; ?>"> </td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">کدملی نصاب</td>
            </tr>
            <tr class="fielddesc">
                <td><input   required
                             oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                             oninput="this.setCustomValidity('')"
                             type="text" name="installercode" id="" style="width: 100%" value="<?php echo $item->installercode; ?>"> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تاریخ نصب</td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"

                            type="text" name="installdate" id="" style="width: 100%" value="<?php  echo $item->installdate; ?>"> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تاریخ صدور</td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"

                            type="text" name="issuedate" id="" style="width: 100%" value="<?php echo $item->issuedate; ?>"> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام نماینده</td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"
                            type="text" name="agentname" id="" style="width: 100%" value="<?php echo $item->agentname; ?>"> </td>

            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام شهر</td>
            </tr>
            <tr class="fielddesc">
                <td><input  required
                            placeholder="تهران یا اراک"
                            oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                            oninput="this.setCustomValidity('')"
                            type="text" name="cityname" id="" style="width: 100%" value="<?php echo $item->cityname; ?>"> </td>
            </tr>
            </tbody>
        </table>
        </form>
    </div>




    <?php






    ?>

</div>
