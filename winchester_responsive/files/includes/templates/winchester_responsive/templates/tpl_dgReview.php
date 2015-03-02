<?php 
// dgReviews v 1.01
//Modified to work with version v1.3.6  of the dgcart
// This is a quick down and dirty mod to add product reviews onto the product info page
// by MichaelDuvall.com
// Modified by Anne (Picaflor-Azul.com) for Winchester Responisve v. 1.0
?>
	<!-- bof: dgReviews-->
<div class="pi-reviews">
<?php
//change this constant to change the title for the customer reviews
  $review_title = 'Customer Reviews';
  
 $review_status = " and r.status = '1'";
  /* This is where you change the parameter value to output 1000 charaters or equivelent */
  $reviews_query_raw = "select r.reviews_id, left(rd.reviews_text, 1000) as reviews_text,
                               r.reviews_rating, r.date_added, r.customers_name
                        from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd
                        where r.products_id = '" . (int)$_GET['products_id'] . "'
                        and r.reviews_id = rd.reviews_id
                        and rd.languages_id = '" . (int)$_SESSION['languages_id'] . "'" .
                        $review_status . "
                        order by r.reviews_id desc";

  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>
  <?php 
  if ($reviews->fields['count'] > 0) {
  }
  ?>
  
  <div class="navSplitPagesResult"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>
<br/>
  <div class="forward"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'main_page'))); ?></div>
  <br class="clearBoth" />  
 <?php
    }

    $reviews = $db->Execute($reviews_split->sql_query);

    while (!$reviews->EOF) {
?>
  <?php // change the class name here to reflect your CSS page ?>

<div class="pi-reviews-wrapper">

<div class="pi-reviews-left">
<div class="review-date"><?php echo sprintf(zen_date_short($reviews->fields['date_added'])); ?></div>
<div class="review-name"><?php echo sprintf(zen_output_string_protected($reviews->fields['customers_name'])); ?></div><div class="rating">
<?php echo  sprintf(zen_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews->fields['reviews_rating'] . '.png', sprintf(TEXT_OF_5_STARS, $reviews->fields['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews->fields['reviews_rating']))  . '</div></div><div class="pi-reviews-right">' . zen_break_string(zen_output_string_protected(stripslashes($reviews->fields['reviews_text'])), 35, ''); ?>


</div>
<div class="clearBoth"></div></div>


 
<?php
      $reviews->MoveNext();
    }
?>
<?php
  } else {

echo TEXT_FIRST_REVIEW . '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . TEXT_FIRST_REVIEW_WRITE . '</a>';
?>
 
<?php
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<div id="productReviewLink" class="buttonRow"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?></div>

    <div class="navSplitPagesResult"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></div>
  <br/>
    <div><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'main_page'))); ?></div>
 
<?php
  }
?>
</div>
<!-- eof dgreviews -->
<?php //this is the end of dgReview?>