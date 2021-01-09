<div class="wrap">

    <h2><?php _e('پنل مدیریت', 'tcf') ?></h2>
    <h2 class="nav-tab-wrapper">

        <?php foreach ($tabs as $tab => $title):
            $class = ($tab == $current_tab) ? 'nav-tab-active' : '';

            echo "<a class='nav-tab $class' href='?page=bsd_setting&tab=$tab'>$title</a>";
        endforeach; ?>

    </h2>
    <form action="" method="POST">
        <table class="form-table">
            <?php switch ($current_tab) {


                case 'general':
                    ?>
                    <tr valign="top">
                        <th scope="row">فعال کردن سامانه استعلام اراک</th>
                        <td><input type="checkbox"
                                   name="arak_active"<?php echo intval(get_option('arak_active')) ? 'checked' : ''; ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">فعال کردن سامانه استعلام تهران</th>
                        <td><input type="checkbox"
                                   name="tehran_active"<?php echo intval(get_option('tehran_active')) ? 'checked' : ''; ?> />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">نمایش متن در صورت عدم فعال بودن سامانه</th>
                        <td><input type="text"
                                   required
                                   style="width:400px;"
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   name="empform_admin_email"
                                   value="<?php echo get_option('empform_admin_email'); ?>"/>
                        </td>
                    </tr>

                    <?php break;

                case 'setting2': ?>

                    <tr valign="top">
                        <th scope="row">نام شهر</th>
                        <td><select required type="text" name="cityname" placeholder=" "
                                    value=""/>

                            <option value="تهران">تهران</option>
                            <option value="اراک">اراک</option>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">کد</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text"

                                   name="personalid"
                                   placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">نام مالک</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="ownername"  placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">آدرس</th>
                        <td><input style="width: 600px; height: 30px;" type="text" name="address"  required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')" placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">تعداد درب ها</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="doorcount"  placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">شماره سریال ها</th>
                        <td><input style="width: 600px; height: 30px;" type="text" name="serialnumber" required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   placeholder=" حتما با این فرمت وارد کنید : 12345,12334,1234"
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">شماره شهرسازی</th>
                        <td><input  type="text" name="citynumber"  placeholder=" " required
                                    oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                    oninput="this.setCustomValidity('')"
                                    value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">کد ملی خریدار</th>
                        <td><input type="text"


                                             title=""
                                             pattern="[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]" name="buyercode"
                                             required

                                             oninvalid="setCustomValidity('لطفا کد ملی را وارد کنید')"

                                             oninput="setCustomValidity('')">
                            <script>//IN GHESMAT BARAYE CUSTOM KARDAN ERROR POR KARDAN FIED AST
                                var input = document.getElementById('nationalcode');
                                input.oninvalid = function (event) {
                                    event.target.setCustomValidity('لطفا یک فرمت صحیح کد ملی راوارد کن');
                                }
                            </script>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">نصاب</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="installer"  placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">کد ملی نصاب</th>
                        <td>                <input type="text"
                                                   title=" "
                                                   pattern="[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]" name="installercode"
                                                   required
                                                   oninvalid="setCustomValidity('لطفا کد ملی را وارد کنید')"

                                                   oninput="setCustomValidity('')">
                            <script>//IN GHESMAT BARAYE CUSTOM KARDAN ERROR POR KARDAN FIED AST
                                var input = document.getElementById('nationalcode');
                                input.oninvalid = function (event) {
                                    event.target.setCustomValidity('لطفا یک فرمت صحیح کد ملی راوارد کن');
                                }
                            </script>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">تاریخ نصب</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="installdate"  placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">تاریخ صدور</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="issuedate" placeholder=" "
                                   value=""/>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">نام نماینده</th>
                        <td><input required
                                   oninvalid="this.setCustomValidity('این قسمت را تکمیل کنید')"
                                   oninput="this.setCustomValidity('')"
                                   type="text" name="agentname" placeholder=" "
                                   value=""/>
                        </td>
                    </tr>

                    <?php
                    break;

                case 'inbox':


                global $wpdb, $table_prefix;

                $has_error = false;
                $success = false;
                $message = '';


                if (isset($_GET['action'])) {

                    $action = $_GET['action'];

                    switch ($action) {

                        case 'delete':
                            $item_id = isset($_GET['item_id']) ? intval($_GET['item_id']) : 0;

                            if ($item_id) {

                                $result = $wpdb->delete($table_prefix . 'bsd_form', array('ID' => $item_id), array('%d'));
                                if ($result) {

                                    $success = true;
                                    $message = 'فیلد مورد نظر حذف گردید ‍‍‍‍‍‍‍‍‍';

                                } else {

                                    $has_error = true;
                                    $message = 'خطایی رخ داده است لطفا بعا امتحان کنید';
                                    // ba in tabe jomle balaee nemashe dade nmiashavad
                                    wp_redirect('admin.php?page=bsd_main');
                                }
                            }
                            break;

                        case 'open':

                            include BSD_TPL_DIR.'details-info.php';

                            break;

//                        case 'edit':
//                            include BSD_TPL_DIR.'edit-info.php';

                        case 'search':

                            $result = $wpdb->get_results($table_prefix . 'bsd_form', array('buyercode' => $item_id), array('%d'));//nothing


                    }


                }



                $all_bsdform=$wpdb->get_results("SELECT * FROM  {$table_prefix}bsd_form");//SELECT * FROM `bsd_form`


                include BSD_TPL_DIR.'html-inbox-page.php';

                  break;

                case 'search':


                    include BSD_TPL_DIR.'html-search-page.php';

            }
            ?>
        </table>
        <?php wp_nonce_field('save_admin_setting', 'bsd_nonce'); ?>
        <?php submit_button('ذخیره ','primary',$current_tab) ## name="$current_tab"?>
    </form>
</div>

