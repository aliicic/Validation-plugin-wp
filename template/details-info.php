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
        <table cellspacing="0" class=" widefat fixed entry-detail-view">
            <thead>
            <tr>
                <th id="details">
                    مشخصات کامل
                </th>

                <th style="width:auto; font-size:10px; text-align: left;">
                    <a title="برای ویرایش اطلاعات این فرم کلیک کنید"
                       href="<?php echo admin_url( 'admin.php?page=bsd_edit&action=open&item_id='.$item->ID );?>" >
                    <input type="button" id="" value="ویرایش" class="button">&nbsp;&nbsp;</a>

                </th>


            </tr>
            </thead>
            <tbody>

            <tr>
                <td colspan="2"  class="entry-view-field-name" >کد</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->personalid; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام مالک</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->ownername; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">آدرس</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->address; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تعداد درب ها</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->doorcount; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">شماره سریال ها </td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->serialnumber; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">شماره شهرسازی</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->citynumber; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">کد ملی خریدار</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->buyercode; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام نصاب</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->installer; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">کدملی نصاب</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->installercode; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تاریخ نصب</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->installdate; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">تاریخ صدور</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->issuedate; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام نماینده</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->agentname; ?></td>
            </tr>
            <tr class="fieldname">
                <td colspan="2"  class="entry-view-field-name">نام شهر</td>
            </tr>
            <tr class="fielddesc">
                <td> <?php echo $item->cityname; ?></td>
            </tr>

            </tbody>
        </table>
    </div>



    <?php






    ?>

</div>
