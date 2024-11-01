<?php

/*
* Stop execution if someone tried to get file directly.
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//======================================================================
// Woocommerce Fields
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
    $text_value = __( 'Special Offer! Get 20% off:', 'wpoptin' );
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
if ( isset( $_GET['type'] ) && !empty( $_GET['type'] ) ) {
    $type = $_GET['type'];
}
$url_type = $WPOptins->wpop_get_settings(
    $wpoptin_id,
    'url_type',
    false,
    false,
    $is_child
);
//if class woocommerce exists then show the product list
if ( class_exists( 'WooCommerce' ) ) {
    $products = get_posts( [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ] );
    if ( !empty( $products ) ) {
        ?>
        <div class="input-field col s12 wpop_new_woo_product_wrap">
            <select name="wpop_new_woo_product" id="wpop_new_woo_product">
                <option value=""><?php 
        esc_html_e( "Select Product", 'wpoptin' );
        ?></option>
				<?php 
        foreach ( $products as $product ) {
            ?>
                    <option value="<?php 
            echo esc_attr( $product->ID );
            ?>" <?php 
            selected( $WPOptins->wpop_get_settings(
                $wpoptin_id,
                'woo-product',
                false,
                false,
                $is_child
            ), $product->ID );
            ?>><?php 
            echo esc_attr( $product->post_title );
            ?></option>
				<?php 
        }
        ?>
            </select>
            <label for="wpop_new_woo_product">
				<?php 
        esc_html_e( "Select Product", 'wpoptin' );
        ?>
            </label>
        </div>
		<?php 
    } else {
        ?>
        <div class="input-field col s12 wpop_no_woo_product_wrap">
            <a href="#wpop-no-product-woocommerce" class="modal-trigger">
                <div class="wpop-content-locked"></div>
            </a>
            <div id="wpop-no-product-woocommerce"
                 class="modal wpop-upgrade-modal">
                <div class="modal-content">
                    <div class="wpop-modal-content">
                        <h5><?php 
        esc_html_e( "No Product Found", 'wpoptin' );
        ?></h5>
                        <p><?php 
        esc_html_e( "No products were found. Kindly add a new product.", 'wpoptin' );
        ?></p>
                        <a href="<?php 
        echo esc_url( site_url( '/wp-admin/edit.php?post_type=product' ) );
        ?>"
                           target="_blank" class="waves-effect waves-light btn z-depth-3"><i class="material-icons right">chevron_right
                            </i><?php 
        esc_html_e( "Add Product", 'wpoptin' );
        ?>
                        </a>
                    </div>
                </div>
            </div>
            <select name="wpop_new_woo_product" id="wpop_new_woo_product">
                <option value=""><?php 
        esc_html_e( "No product found", 'wpoptin' );
        ?></option>
            </select>
            <label for="wpop_new_woo_product">
				<?php 
        esc_html_e( "Select Product", 'wpoptin' );
        ?>
            </label>
        </div>
        <?php 
    }
}
$type = ( isset( $type ) ? $type : '' );
if ( 'bar' == $type ) {
    ?>
    <div class="input-field col s12">
        <input id="wpop_new_content" type="text" value="<?php 
    echo esc_attr( $text_value );
    ?>"
               name="wpop_new_content" required>
        <label for="wpop_new_content">
			<?php 
    esc_html_e( "Content", 'wpoptin' );
    ?>
        </label>
    </div>
    <?php 
}
?>
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

        <div id="wpop-upgrade-fomo-countdown" class="modal wpop-upgrade-modal">
            <div class="modal-content">
                <div class="wpop-modal-content">
                    <span class="wpop-lock-icon"><i class="material-icons">lock_outline</i> </span>
                    <h5><?php 
esc_html_e( "Premium Feature", 'wpoptin' );
?></h5>
                    <p><?php 
esc_html_e( "We're sorry, Loop the timer for selected time duration is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features. Perfect way to increase conversion by 10X with fear not to miss count down timer.", 'wpoptin' );
?></p>
                    <hr>
                    <p><?php 
esc_html_e( "Use following coupon to get 27% discount for limited time", 'wpoptin' );
?>
                        <br><code>BFCMOP</code></p>
                    <a href="<?php 
echo esc_url( wpop_fs()->get_upgrade_url() );
?>"
                       class="waves-effect waves-light btn z-depth-3"><i
                                class="material-icons right">lock_open</i><?php 
esc_html_e( "Upgrade to pro", 'wpoptin' );
?>
                    </a>

                </div>
            </div>
        </div>
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

        <div id="wpop-upgrade-deactivate-timer" class="modal wpop-upgrade-modal">
            <div class="modal-content">
                <div class="wpop-modal-content">
                    <span class="wpop-lock-icon"><i class="material-icons">lock_outline</i> </span>
                    <h5><?php 
esc_html_e( "Premium Feature", 'wpoptin' );
?></h5>
                    <p><?php 
esc_html_e( "We're sorry, Auto deactivate when time ends is not included in your plan. Please upgrade to the premium plan to unlock this and all other cool features.", 'wpoptin' );
?></p>
                    <hr>
                    <p><?php 
esc_html_e( "Use following coupon to get 27% discount for limited time", 'wpoptin' );
?>
                        <br><code>BFCMOP</code></p>
                    <a href="<?php 
echo esc_url( wpop_fs()->get_upgrade_url() );
?>"
                       class="waves-effect waves-light btn z-depth-3"><i
                                class="material-icons right">lock_open</i><?php 
esc_html_e( "Upgrade to pro", 'wpoptin' );
?>
                    </a>

                </div>
            </div>
        </div>
	<?php 
?>
        </p>

    </div>

<?php 
if ( 'bar' != $type ) {
    ?>

    <div class="input-field col s12 wpop_feat_img_wraper">
        <input id="wpop_feat_img" type="text" id="wpop_feat_img"
               placeholder="(If set this image will be used as a featured image for the optin.)"
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