<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Loaded automatically by index.php?main_page=checkout_payment_address.<br />
 * Allows customer to change the billing address.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte Mar 29 13:27:11 2016 -0500 Modified in v1.5.5 $
 */
?>
<div id="checkoutPaymentAddressDefault" class="centerColumn">

<h1 id="checkoutPaymentAddressDefault-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>
<?php if ($messageStack->size('checkout_address') > 0) echo $messageStack->output('checkout_address'); ?>

<!--bof billing address card-->
    <div id="billingAddress-card" class="card mb-3">
<h4 id="billingAddress-card-header" class="card-header">
<?php echo TITLE_PAYMENT_ADDRESS; ?></h4>
<div id="billingAddress-card-body" class="card-body p-3">

<div class="row">
<div id="billingAddress-billToAddress" class="billToAddress col-sm-5">
     <address><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['billto'], true, ' ', '<br />'); ?></address>
</div>
<div class="col-sm-7">
<div id="billingAddress-content" class="content"><?php echo TEXT_SELECTED_PAYMENT_DESTINATION; ?></div>
</div>
</div>

</div>
    </div>
<!--eof billing address card-->

<?php
     if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
?>
<?php
/**
 * require template to collect address details
 */
 require($template->get_template_dir('tpl_modules_checkout_new_payment_address.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_new_payment_address.php');
?>

<?php
    }
    if ($addresses_count > 1) {
?>
<?php echo zen_draw_form('checkout_address_book', zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'), 'post', 'class="group"'); ?>

<!--bof choose from your address book entries card-->
    <div id="addressBookEntries-card" class="card mb-3">
<h4 id="addressBookEntries-card-header" class="card-header">
<?php echo TABLE_HEADING_NEW_PAYMENT_ADDRESS; ?></h4>
<div id="addressBookEntries-card-body" class="card-body p-3">
    
<?php
      require($template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_address_book.php');
?>
<div id="addressBookEntries-btn-toolbar" class="btn-toolbar justify-content-between" role="toolbar">
<?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . '<br />' . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?>
<?php echo zen_draw_hidden_field('action', 'submit') . zen_image_submit(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT); ?>
</div>

</div>
</div>
<!--eof choose from your address book entries card-->
<?php
     }
?>

</form>
<?php
  if ($process == true) {
?>
<div id="checkoutPaymentAddressDefault-btn-toolbar" class="btn-toolbar justify-content-end mt-3" role="toolbar">
<?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  }
?>
</div>