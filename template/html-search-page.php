<div class="wrap">

    <h2><?php _e( 'سرچ کنید', 'bsd' ); ?></h2>
    <?php if($has_error): ?>
        <div class="error">

            <p><?php echo $message;?></p>

        </div>
    <?php elseif($success): ?>
        <div class="updated">

            <p><?php echo $message;?></p>

        </div>
    <?php endif; ?>

    <div id="employment_wrap">
        <form id="search_form" action="" method="POST">

            <p style="display: block;">اطلاعات را وارد کنید</p>

            <div class="part1">
                <p>
                    <span style="width: 100px;display: inline-block">کد ملی خریدار :</span>
                    <span>
                    <input type="text"

                           id="nationalcode"
                           title="فرمت صحیح کد ملی را وارد کنید"
                           pattern="[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]" name="nacode"

                           oninvalid="setCustomValidity('لطفا کد ملی را وارد کنید')"
                          value="<?php echo get_option('nacode'); ?>"
                           oninput="setCustomValidity('')">
                        <script>//IN GHESMAT BARAYE CUSTOM KARDAN ERROR POR KARDAN FIED AST
                            var input = document.getElementById('nationalcode');
                            input.oninvalid = function (event) {
                                event.target.setCustomValidity('لطفا یک فرمت صحیح کد ملی راوارد کن');
                            }
                        </script>
                </span>

                </p>

            </div>

            <p style="text-align: center ; ">
<!--           --><?php //  wp_nonce_field('empform_submit','empsubmit_none'); ?>

                <input type="submit" class="button" style="float: right;margin-right: 104px;margin-bottom: 20px;width: 186px;" name="search_submit" value="جستجو">

            </p>
        </form>
    </div>





        <table class="wp-list-table widefat fixed striped payments">
        <thead>
        <tr>
            <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                <input id="cb-select-all-1" type="checkbox">
            </th>
            <th scope="col" id="title" class="manage-column ">کد</th>
            <th scope="col" id="title" class="manage-column ">نام مالک</th>
            <th scope="col" id="title" class="manage-column ">کدملی خریدار</th>
            <th scope="col" id="title" class="manage-column "> تاریخ نصب </th>
            <th scope="col" id="title" class="manage-column ">عملیات</th>
            <th scope="col" id="title" class="manage-column ">محتوای کامل</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                <input id="cb-select-all-1" type="checkbox">
            </th>
            <th scope="col" id="title" class="manage-column ">کد</th>
            <th scope="col" id="title" class="manage-column ">نام مالک</th>
            <th scope="col" id="title" class="manage-column ">کدملی خریدار</th>
            <th scope="col" id="title" class="manage-column "> تاریخ نصب </th>
            <th scope="col" id="title" class="manage-column ">عملیات</th>
            <th scope="col" id="title" class="manage-column ">محتوای کامل</th>
        </tr>
        </tfoot>

<?php
//
$_POST['search_submit']=true;//if you delet these two line of codes you can go back . :) an also you should rempalce $mccode with $_POST['nacode'] in query.
$mcode=get_option('nacode');
if (isset($_POST['search_submit'])) {
//echo '<script language="javascript">';
//echo 'alert("'.$mcode.'")';
//echo '</script>';
global $wpdb, $table_prefix;

$all_info_search = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bsd_form WHERE buyercode='" . $mcode . "'");

?>

            <tbody id="the-list">
            <?php if (count($all_info_search) > 0) : ?>
                <?php foreach ($all_info_search as $item): ?>
                    <tr>
                        <th scope="row" class="check-column">
                            <label class="screen-reader-text" for="cb-select-<?php echo $item->ID; ?>"></label>
                            <input id="cb-select-<?php echo $item->ID; ?>" type="checkbox" name="selected[]"
                                   value="<?php echo $item->ID; ?>">
                        </th>
                        <td><?php echo $item->personalid; ?></td>
                        <td><?php echo $item->ownername; ?></td>
                        <td><?php echo $item->buyercode; ?></td>
                        <td><?php echo $item->installdate; ?></td>

                        <td>
                            <a title="حذف کردن این آیتم"
                               href="<?php echo admin_url('admin.php?page=bsd_setting&tab=search&action=delete&item_id='. $item->ID); ?>"<span
                                class="dashicons dashicons-trash"></span></a>
                        </td>
                        <td>
                            <a title="نمایش اطلاعات کامل این فرم"
                               href="<?php echo admin_url('admin.php?page=bsd_details&action=open&item_id=' . $item->ID); ?>"><span
                                >نمایش و ویرایش اطلاعات</span></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="no-items">
                    <td class="colspanchnage" colspan="9"><?php _e('هیچ مورد یافت نشد'); ?></td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>

<?php
}

if(isset( $_GET['res'])) {

    $_POST['search_submit']=true;
}

$action = $_GET['action'];

 switch ($action) {

    case 'delete':

        $item_id =$_GET['item_id'];

        if ($item_id) {
            global $wpdb, $table_prefix;
            $result = $wpdb->delete($table_prefix . 'bsd_form', array('ID' => $item_id), array('%d'));
            if ($result) {

                $success = true;
                $message = 'فیلد مورد نظر حذف گردید ‍‍‍‍‍‍‍‍‍';
                wp_redirect('admin.php?page=bsd_setting&tab=search&res=okay');
            } else {

                $has_error = true;
                $message = 'خطایی رخ داده است لطفا بعا امتحان کنید';
                // ba in tabe jomle balaee nemashe dade nmiashavad
                wp_redirect('admin.php?page=bsd_setting&tab=search&res=false');
            }
        }
        break;}

?>
</div>
