<?php

/*
* Stop execution if someone tried to get file directly.
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The Template for displaying Offer Bar
 *
 * This template can be overridden by copying it to
 * wpoptin/frontend/templates/template-offer-bar.php
 *
 */
//======================================================================
// Offer Bar Template
//======================================================================
if ( is_customize_preview() ) {
    $attr = 'data-trigger_method="auto"';
    $attr = 'data-auto_method="im"';
}
$feat_img = $WPOptins->wpop_get_settings(
    $xoptin_id,
    'feat_img',
    false,
    false,
    $is_child
);
if ( $feat_img ) {
    $feat_img_class = 'wpop-has-feat-img';
} else {
    $feat_img_class = 'wpop-no-feat-img';
}
$position = '';
if ( wpop_fs()->is_free_plan() ) {
    $wpop_license_class = 'wpop_is_free';
} else {
    $wpop_license_class = '';
}
$wpop_template_nonce = wp_create_nonce( 'wpop-template-nonce' );
?>
<div id="xo_wrapper">
<div class="xo_bar_wrap xo_not_visible <?php 
echo esc_attr( $feat_img_class );
?> xo_<?php 
echo esc_attr( $xoptin_id );
?> xo_is_<?php 
echo esc_attr( $type );
?> xo_is_<?php 
echo esc_attr( $optin_goal );
?> <?php 
echo esc_attr( $position );
?> <?php 
echo esc_attr( $wpop_license_class );
?>"
	 data-module="<?php 
echo esc_attr( $optin_goal );
?>"
	 data-wpop-template-nonce="<?php 
echo esc_attr( $wpop_template_nonce );
?>"
	 data-timer_date="<?php 
echo esc_attr( $WPOptins->wpop_get_settings(
    $xoptin_id,
    'timer-enddate',
    false,
    false,
    $is_child
) );
?>"
	 data-timer_time="<?php 
echo esc_attr( $WPOptins->wpop_get_settings(
    $xoptin_id,
    'timer-endtime',
    false,
    false,
    $is_child
) );
?>"
	 data-auto_deactivate="<?php 
echo esc_attr( $WPOptins->wpop_get_settings(
    $xoptin_id,
    'timer-auto-deactivate',
    false,
    false,
    $is_child
) );
?>"
	 data-type="<?php 
echo esc_attr( $type );
?>" id="<?php 
echo esc_attr( $xoptin_id );
?>"
	<?php 
?>
         data-id="<?php 
echo esc_attr( $xoptin_id );
?>" <?php 
echo wp_kses_post( $attr );
?>>


		<?php 
/*
 * Populate HTML according to type
 */
switch ( $type ) {
    case 'popup':
        ?>

                <div class="wpop-popup-content-wrapper">
					<?php 
        do_action( 'wpop_offer_popup_before', $instance );
        $feat_img = $WPOptins->wpop_get_settings(
            $xoptin_id,
            'feat_img',
            false,
            false,
            $is_child
        );
        if ( isset( $feat_img ) && !empty( $feat_img ) ) {
            ?>

                        <div class="wpop-popup-feat-img">

							<?php 
            do_action( 'wpop_offer_popup_before_image', $instance );
            ?>

                            <img src="<?php 
            echo esc_url( apply_filters( 'wpop_offer_popup_image_url', $feat_img, $instance ) );
            ?>"/>

							<?php 
            do_action( 'wpop_offer_popup_after_image', $instance );
            ?>
                        </div>

					<?php 
        }
        ?>
                    <div class="wpop-popup-content-holder">
                        <div class="xo_front_c">

							<?php 
        if ( isset( $content ) && !empty( $content ) ) {
            ?>
                            <div class="xo_offer_c_wrap">
                                <div class="xo_offer_c">

									<?php 
            do_action( 'wpop_offer_popup_before_content', $instance );
            ?>

                                    <p><?php 
            echo esc_html( apply_filters( 'wpop_offer_popup_content', $content, $instance ) );
            ?></p>

									<?php 
            do_action( 'wpop_offer_popup_after_content', $instance );
            ?>

                                </div>
								<?php 
        }
        ?>

                            </div>
                            <div class="xo_offer_btn">

								<?php 
        do_action( 'wpop_offer_popup_before_button', $instance );
        ?>

                                <a data-id="<?php 
        echo esc_attr( $xoptin_id );
        ?>"
                                   href="<?php 
        echo esc_url( apply_filters( 'wpop_offer_popup_button_url', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-url',
            false,
            false,
            $is_child
        ), $instance ) );
        ?>"
                                   class="xo_offer_cta">

									<?php 
        echo esc_html( apply_filters( 'wpop_offer_popup_button_text', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-text',
            false,
            false,
            $is_child
        ), $instance ) );
        ?></a>

								<?php 
        do_action( 'wpop_offer_popup_after_button', $instance );
        ?>
                            </div>
                        </div>

                    </div>

					<?php 
        do_action( 'wpop_offer_popup_after', $instance );
        ?>

                </div>

				<?php 
        break;
    case 'wellcome_matt':
        ?>

                <div class="wppop-wellcome-matt-container">
                    <div class="wppop-wellcome-matt-inner">

						<?php 
        do_action( 'wpop_offer_wellcome_matt_before', $instance );
        $feat_img = $WPOptins->wpop_get_settings(
            $xoptin_id,
            'feat_img',
            false,
            false,
            $is_child
        );
        if ( isset( $feat_img ) && !empty( $feat_img ) ) {
            ?>

                            <div class="wpop-wellcome-matt-feat-img">

								<?php 
            do_action( 'wpop_offer_wellcome_matt_before_image', $instance );
            ?>

                                <img src="<?php 
            echo esc_url( apply_filters( 'wpop_offer_wellcome_matt_image_url', $feat_img, $instance ) );
            ?>"/>

								<?php 
            do_action( 'wpop_offer_wellcome_matt_after_image', $instance );
            ?>
                            </div>

						<?php 
        }
        ?>
                        <div class="xo_front_c">

							<?php 
        if ( isset( $content ) && !empty( $content ) ) {
            ?>
                            <div class="xo_offer_c_wrap">
                                <div class="xo_offer_c">

									<?php 
            do_action( 'wpop_offer_wellcome_matt_before_content', $instance );
            ?>

                                    <p><?php 
            echo esc_html( apply_filters( 'wpop_offer_wellcome_matt_content', $content, $instance ) );
            ?></p>
                                    <p><?php 
            echo esc_html( apply_filters( 'wpop_offer_wellcome_matt_content', $content, $instance ) );
            ?></p>

									<?php 
            do_action( 'wpop_offer_wellcome_matt_after_content', $instance );
            ?>

                                </div>
								<?php 
        }
        ?>

                            </div>
                            <div class="xo_offer_btn">

								<?php 
        do_action( 'wpop_offer_wellcome_matt_before_button', $instance );
        ?>

                                <a data-id="<?php 
        echo esc_attr( $xoptin_id );
        ?>"
                                   href="<?php 
        echo esc_url( apply_filters( 'wpop_offer_wellcome_matt_button_url', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-url',
            false,
            false,
            $is_child
        ), $instance ) );
        ?>"
                                   class="xo_offer_cta">

									<?php 
        echo esc_html( apply_filters( 'wpop_offer_wellcome_matt_button_text', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-text',
            false,
            false,
            $is_child
        ), $instance ) );
        ?></a>

								<?php 
        do_action( 'wpop_offer_wellcome_matt_after_button', $instance );
        ?>
                            </div>
                        </div>

						<?php 
        do_action( 'wpop_offer_wellcome_matt_after', $instance );
        ?>

                    </div>
                </div>

				<?php 
        break;
    case 'slide_in':
        ?>

				<?php 
        do_action( 'wpop_offer_slide_in_before', $instance );
        $feat_img = $WPOptins->wpop_get_settings(
            $xoptin_id,
            'feat_img',
            false,
            false,
            $is_child
        );
        if ( isset( $feat_img ) && !empty( $feat_img ) ) {
            ?>

                    <div class="wpop-slidein-feat-img">

						<?php 
            do_action( 'wpop_offer_slide_in_before_image', $instance );
            ?>

                        <img src="<?php 
            echo esc_url( apply_filters( 'wpop_offer_slide_in_image_url', $feat_img, $instance ) );
            ?>"/>

						<?php 
            do_action( 'wpop_offer_slide_in_after_image', $instance );
            ?>
                    </div>

				<?php 
        }
        ?>
                <div class="xo_front_c">

					<?php 
        if ( isset( $content ) && !empty( $content ) ) {
            ?>
                    <div class="xo_offer_c_wrap">
                        <div class="xo_offer_c">

							<?php 
            do_action( 'wpop_offer_slide_in_before_content', $instance );
            ?>

                            <p><?php 
            echo esc_html( apply_filters( 'wpop_offer_slide_in_content', $content, $instance ) );
            ?></p>

							<?php 
            do_action( 'wpop_offer_slide_in_after_content', $instance );
            ?>

                        </div>
						<?php 
        }
        ?>

                    </div>
                    <div class="xo_offer_btn">

						<?php 
        do_action( 'wpop_offer_slide_in_before_button', $instance );
        ?>

                        <a data-fancybox-close
                           href="<?php 
        echo esc_url( apply_filters( 'wpop_offer_slide_in_button_url', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-url',
            false,
            false,
            $is_child
        ), $instance ) );
        ?>"
                           class="xo_offer_cta">

							<?php 
        echo esc_html( apply_filters( 'wpop_offer_slide_in_button_text', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-text',
            false,
            false,
            $is_child
        ), $instance ) );
        ?></a>

						<?php 
        do_action( 'wpop_offer_slide_in_after_button', $instance );
        ?>
                    </div>
                    <div id="xo_close"><i class="icon mt-times"></i></div>
					<?php 
        if ( wpop_fs()->is_free_plan() ) {
            ?>
						<div title="<?php 
            echo esc_attr( __( 'Powered by WPOptin', 'wpoptin' ) );
            ?>"
     style="cursor: pointer; opacity: .8 !important; display: block !important; z-index: 999999 !important; position: absolute; left: auto; right: auto; text-align: center; margin-left: auto; margin-right: auto; bottom: -45px; left: 50%; -webkit-transform: translate(-50%, 0); -ms-transform: translate(-50%, 0); transform: translate(-50%, 0);"
     data-class="<?php 
            echo esc_attr( 'wpop_redirect_home' );
            ?>"
     data-id="<?php 
            echo esc_attr( 'wpop_bar_branding' );
            ?>"
     data-wpop-inverted-img="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpoptin-logo.png' );
            ?>"
     data-wpop-real-img="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpoptin-logo.png' );
            ?>">
    <img style="width: 35px; opacity: 1 !important; display: block !important; z-index: 999999 !important;"
         src="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpoptin-logo.png' );
            ?>" />
</div>

					<?php 
        }
        ?>
                </div>

				<?php 
        do_action( 'wpop_offer_slide_in_after', $instance );
        ?>


				<?php 
        break;
    default:
        ?>

                <div class="xo_front_c">

					<?php 
        if ( wpop_fs()->is_free_plan() ) {
            ?>
                        <div title="<?php 
            echo esc_attr( __( 'Powered by WPOptin', 'wpoptin' ) );
            ?>"
     style="cursor: pointer; opacity: .8 !important; display: block !important; z-index: 999999 !important; position: absolute; left: 25px; top: 50%; transform: translate(0, -50%); -webkit-transform: translate(0, -50%); -ms-transform: translate(0, -50%);"
     data-class="<?php 
            echo esc_attr( 'wpop_redirect_home' );
            ?>"
     data-id="<?php 
            echo esc_attr( 'wpop_bar_branding' );
            ?>"
     data-wpop-inverted-img="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpoptin-dark-gray-logo.png' );
            ?>"
     data-wpop-real-img="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpop-gray-logo.png' );
            ?>">
    <img style="width: 35px; opacity: 1 !important; display: block !important; z-index: 999999 !important;"
         src="<?php 
            echo esc_url( WPOP_URL . '/assets/images/wpop-gray-logo.png' );
            ?>" />
</div>

					<?php 
        }
        ?>
					<?php 
        if ( isset( $content ) && !empty( $content ) ) {
            ?>

                    <div class="xo_offer_c_wrap">

                        <div class="xo_offer_c">

							<?php 
            do_action( 'wpop_offer_bar_before_content', $instance );
            ?>

                            <p><?php 
            echo esc_html( apply_filters( 'wpop_offer_bar_content', $content, $instance ) );
            ?></p>

							<?php 
            do_action( 'wpop_offer_bar_after_content', $instance );
            ?>

                        </div>
						<?php 
        }
        ?>

                    </div>

                    <div class="xo_offer_btn">

						<?php 
        do_action( 'wpop_offer_bar_before_button', $instance );
        ?>

                        <a href="<?php 
        echo esc_url( apply_filters( 'wpop_offer_bar_button_url', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-url',
            false,
            false,
            $is_child
        ), $instance ) );
        ?>"
                           class="xo_offer_cta">

							<?php 
        echo esc_html( apply_filters( 'wpop_offer_bar_button_text', $WPOptins->wpop_get_settings(
            $xoptin_id,
            'offer-btn-text',
            false,
            false,
            $is_child
        ), $instance ) );
        ?></a>

						<?php 
        do_action( 'wpop_offer_bar_after_button', $instance );
        ?>
                    </div>

                    <div id="xo_close"><i class="icon mt-times"></i></div>
                </div>

				<?php 
        break;
}
?>

    </div>
</div>