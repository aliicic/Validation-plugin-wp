
<style>
    .widefat th input{
        visibility:hidden!important;
    }
    #wpfooter {
          position: inherit;
      }
</style>


<div class="wrap">

    <h2><?php _e( 'اطلاعات وارد شده', 'bsd' ); ?></h2>
    <?php if($has_error): ?>
        <div class="error">

            <p><?php echo $message;?></p>

        </div>
    <?php elseif($success): ?>
        <div class="updated">

            <p><?php echo $message;?></p>

        </div>
    <?php endif; ?>

    <?php
   if(isset($_GET['flag'])){
    echo '<script language="javascript">';
    echo 'alert("اطلاعات شما با موفقیت ویرایش شد")';
    echo '</script>';}



    ?>

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
            <th scope="col" id="title" class="manage-column ">نام</th>
            <th scope="col" id="title" class="manage-column ">نام مالک</th>
            <th scope="col" id="title" class="manage-column ">کدملی خریدار</th>
            <th scope="col" id="title" class="manage-column "> تاریخ نصب </th>
            <th scope="col" id="title" class="manage-column ">عملیات</th>
            <th scope="col" id="title" class="manage-column ">محتوای کامل</th>
        </tr>
        </tfoot>
        <tbody id="the-list">

        <?php if ( count( $all_bsdform ) > 0 ) : ?>
            <?php foreach ( $all_bsdform as $item ): ?>
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
                           href="<?php echo admin_url( 'admin.php?page=bsd_setting&tab=inbox&action=delete&item_id='.$item->ID );?>"<span
                            class="dashicons dashicons-trash"></span></a>
                    </td>
                    <td>
                        <a title="نمایش اطلاعات کامل این فرم"
                           href="<?php echo admin_url( 'admin.php?page=bsd_details&action=open&item_id='.$item->ID );?>" ><span
                        >نمایش و ویرایش اطلاعات</span></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr class="no-items">
                <td class="colspanchnage" colspan="9"><?php _e( 'هیچ مورد یافت نشد' ); ?></td>
            </tr>
        <?php endif; ?>


        </tbody>
    </table>
</div>