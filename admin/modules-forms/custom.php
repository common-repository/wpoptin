<?php

/*
* Stop execution if someone tried to get file directly.
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//======================================================================
// Offer Bar Fields
//======================================================================
if ( !empty( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'text',
    false,
    false,
    $is_child
) ) ) {
    $text_value = $WPOptins->wpop_get_settings(
        $wpoptin_id,
        'text',
        false,
        false,
        $is_child
    );
} else {
    $text_value = __( 'Want To Become An Expert In Hosting Webinars? Join Our Free Webinar Masterclass!', 'wpoptin' );
}
// echo "<pre>"; print_r($text_value);exit();
if ( !empty( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'offer-btn-text',
    false,
    false,
    $is_child
) ) ) {
    $offer_btn_text = $WPOptins->wpop_get_settings(
        $wpoptin_id,
        'offer-btn-text',
        false,
        false,
        $is_child
    );
} else {
    $offer_btn_text = __( 'Take me there', 'wpoptin' );
}
if ( !empty( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'cupon-code',
    false,
    false,
    $is_child
)['0'] ) ) {
    $cupon_code = $WPOptins->wpop_get_settings(
        $wpoptin_id,
        'cupon-code',
        false,
        false,
        $is_child
    )['0'];
} else {
    $cupon_code = __( 'wpoptin', 'wpoptin' );
}
if ( !empty( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'timer-text',
    false,
    false,
    $is_child
) ) ) {
    $timer_text = $timer_text = $WPOptins->wpop_get_settings(
        $wpoptin_id,
        'timer-text',
        false,
        false,
        $is_child
    );
} else {
    $timer_text = __( 'Hurry Up', 'wpoptin' );
}
?>
<p>
    <label>
        <input type="checkbox" class="filled-in" name="wpop_enable_content"
               id="wpop_enable_content"
			<?php 
echo checked( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'content-enable',
    false,
    false,
    $is_child
), 'on', false );
?> />
        <span>
      <?php 
esc_html_e( "Enable content", 'wpoptin' );
?>
    </span>
    </label>
</p>


<?php 
?>
    <div class="input-field col s12 wpop_new_content_wrap">
        <textarea id="wpop_new_content" name="wpop_new_content"
                  class="materialize-textarea"><?php 
echo esc_attr( $text_value );
?></textarea>
        <a href="#wpop-upgrade-rich-text"
           class="modal-trigger btn wpop-rich-editor-btn"><?php 
esc_html_e( "Enable shortcode & HTML support", 'wpoptin' );
?></a>
    </div>
	<?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-rich-text", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, shortcode & HTML support is not included in your plan. Please upgrade to premium version to unlock this and all other cool features.", 'wpoptin' ) );
}
?>

<?php 
?>


<p>
    <label>
        <input type="checkbox" class="filled-in" name="wpop_enable_button"
               id="wpop_enable_button"
			<?php 
echo checked( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'button-enable',
    false,
    false,
    $is_child
), 'on', false );
?> />
        <span>
      <?php 
esc_html_e( "Enable button", 'wpoptin' );
?>
    </span>
    </label>
</p>
<div class="input-field col s12 wpop_new_btn_wrap">
    <input id="wpop_new_offer_btn_text" type="text"
           value="<?php 
echo esc_attr( $offer_btn_text );
?>" name="wpop_new_offer_btn_text"
           required>
    <label for="wpop_new_offer_btn_text">
		<?php 
esc_html_e( "Button Label", 'wpoptin' );
?>
    </label>
</div>
<div class="input-field col s12 wpop_new_btn_wrap">
<input id="wpop_new_offer_btn_url" type="url"
       value="<?php 
echo esc_url( $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'offer-btn-url',
    false,
    false,
    $is_child
) ?? '' );
?>"
       name="wpop_new_offer_btn_url" required>
    <label for="wpop_new_offer_btn_url">
		<?php 
esc_html_e( "Button URL", 'wpoptin' );
?>
    </label>
</div>
<p>
	<?php 
?>

    <label>
        <input type="checkbox" class="filled-in modal-trigger"
               href="#wpop-upgrade-coupon" id="wpop_enable_cupon"/>
        <span><?php 
esc_html_e( "Enable coupon", 'wpoptin' );
?></span>
    </label>

	<?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-coupon", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, Coupon code is not included in your plan. Please upgrade to premium version to unlock this and all other cool features.", 'wpoptin' ) );
}
?>

<?php 
?>
</p>

<div class="wpop_new_cupon_wrap">
    <div class="input-field col s12">
		<?php 
?>
            <input id="wpop_new_cupon" type="text" value="wpoptin"
                   disabled="disabled">
		<?php 
?>
        <label for="wpop_new_cupon">
			<?php 
esc_html_e( "Coupon code", 'wpoptin' );
?>
        </label>
    </div>
</div>

<p>
	<?php 
?>
    <label>
        <input type="checkbox" class="filled-in modal-trigger"
               href="#wpop-upgrade-timer" id="wpop_enable_timer"/>
        <span><?php 
esc_html_e( "Enable timer", 'wpoptin' );
?></span>
    </label>

	<?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-timer", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, Timer is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features. Perfect way to increase conversion by 10X with count down timer.", 'wpoptin' ) );
}
?>

<?php 
?>
</p>

<div class="wpop_new_timer_wrap">
    <p>
		<?php 
?>
        <label>
            <input type="checkbox" class="filled-in modal-trigger"
                   href="#wpop-upgrade-timer-title"
                   id="wpop_enable_timer_title"/>
            <span><?php 
esc_html_e( "Enable timer title", 'wpoptin' );
?></span>
        </label>
	    <?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-timer-title", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, Hiding timer title is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features. Perfect way to increase conversion by 10X with count down timer.", 'wpoptin' ) );
}
?>

<?php 
?>
</p>
<div class="input-field col s12 wpop-timer-title">
	<?php 
?>

        <input id="wpop_new_timer_text" type="text"
               value="<?php 
esc_html_e( "Hurry Up", 'wpoptin' );
?>" disabled>
	<?php 
?>
    <label for="wpop_new_timer_text">
		<?php 
esc_html_e( "Timer title", 'wpoptin' );
?>
    </label>
</div>

<p>
	<?php 
?>
    <label>
        <input type="checkbox" class="filled-in modal-trigger"
               href="#wpop-upgrade-fomo-countdown"
               id="wpop_enable_fomo_countdown"/>
        <span><?php 
esc_html_e( "Loop the timer for selected time duration", 'wpoptin' );
?></span>
    </label>

	<?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-fomo-countdown", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, Loop the timer for selected time duration is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features. Perfect way to increase conversion by 10X with fear not to miss count down timer.", 'wpoptin' ) );
}
?>

<?php 
?>
</p>
<div class="input-field col s12 wpop-fomo-countdown-wrap">
	<?php 
?>

        <input id="wpop_new_timer_fomo_unit" type="number"
               value="<?php 
esc_html_e( "4", 'wpoptin' );
?>" disabled>
	<?php 
?>
    <label for="wpop_new_timer_fomo_unit">
		<?php 
esc_html_e( "Time Unit", 'wpoptin' );
?>
    </label>

	<?php 
?>
		<?php 
esc_html_e( "Time Duration", 'wpoptin' );
?>
        <select  disabled>
            <option value="minutes"><?php 
esc_html_e( "Minute(s)", 'wpoptin' );
?></option>
            <option value="hours"><?php 
esc_html_e( "Hour(s)", 'wpoptin' );
?></option>
            <option value="days"><?php 
esc_html_e( "Day(s)", 'wpoptin' );
?></option>
        </select>

	<?php 
?>
</div>


<div class="input-field col s12 wpop-new-timer-default-wrap">
	<?php 
?>
        <input type="text" value="2020-02-29" disabled>
	<?php 
?>
    <label for="wpop_new_timer">
		<?php 
esc_html_e( "Timer end date", 'wpoptin' );
?>
    </label>
</div>

<div class="input-field col s12 wpop-new-timer-default-wrap">
	<?php 
?>
        <input type="text" value="12:00 AM" disabled>
	<?php 
?>
    <label for="wpop_timer_end_time">
		<?php 
esc_html_e( "Timer end time", 'wpoptin' );
?>
    </label>
</div>

<p class="wpop-new-timer-default-wrap">
	<?php 
?>
    <label>
        <input type="checkbox" class="filled-in modal-trigger"
               href="#wpop-upgrade-deactivate-timer" id="wpop_auto_deactivate"/>
        <span><?php 
esc_html_e( "Auto deactivate when time ends", 'wpoptin' );
?></span>
    </label>
	<?php 
if ( wpop_fs()->is_free_plan() ) {
    $this->wpop_get_premium_modal_html( "wpop-upgrade-deactivate-timer", esc_html__( "Premium Feature", 'wpoptin' ), esc_html__( "We're sorry, Auto deactivate when time ends is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features.", 'wpoptin' ) );
}
?>
</p>
</div>

<?php 
if ( 'bar' != $type ) {
    ?>

    <div class="input-field col s12 wpop_feat_img_wraper">
        <input id="wpop_feat_img" type="text" id="wpop_feat_img"
               placeholder="(optional)"
               value="<?php 
    echo esc_attr( $WPOptins->wpop_get_settings(
        $wpoptin_id,
        'feat_img',
        false,
        false,
        $is_child
    ) );
    ?>"
               name="wpop_feat_img">

        <span class="wpop-delete-feat-img tooltipped  <?php 
    if ( !$WPOptins->wpop_get_settings(
        $wpoptin_id,
        'feat_img',
        false,
        false,
        $is_child
    ) ) {
        ?> wpop-hide <?php 
    }
    ?>"
              data-id="<?php 
    echo esc_attr( $wpoptin_id );
    ?>" data-position="left"
              data-tooltip="<?php 
    esc_html_e( "Remove Image", 'wpoptin' );
    ?>"><i
                    class="material-icons">delete</i></span>

        <label for="wpop_feat_img"
               class=""><?php 
    esc_html_e( "Image", 'wpoptin' );
    ?></label>

        <i class="btn waves-effect waves-light waves-input-wrapper wpop_feat_img_btn_wraper">
            <input type="button" class=""
                   value="<?php 
    esc_html_e( "Upload Image", 'wpoptin' );
    ?>"
                   id="wpop_feat_img_btn">
            <i class="material-icons left">file_upload</i>
        </i>
    </div>
<?php 
}
?>        
      							    