<?php

/*
* Stop execution if someone tried to get file directly.
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The Template for displaying Custom module
 *
 * This template can be overridden by copying it to
 * wpoptin/frontend/templates/template-custom.php
 *
 */
if ( is_customize_preview() ) {
    $attr = 'data-trigger_method="auto"';
    $attr = 'data-auto_method="im"';
}
$feat_img_class = 'wpop-no-feat-img';
$position = '';
if ( wpop_fs()->is_free_plan() ) {
    $wpop_license_class = 'wpop_is_free';
} else {
    $wpop_license_class = '';
}
?>
<div id="xo_wrapper">
<div class="xo_bar_wrap xo_not_visible <?php 
echo esc_attr( $feat_img_class );
?> xo_<?php 
echo esc_attr( $xoptin_id );
?> xo_is_<?php 
echo esc_attr( $optin_goal );
?> xo_is_<?php 
echo esc_attr( $type );
?> <?php 
echo esc_attr( $position );
?> <?php 
echo esc_attr( $wpop_license_class );
?>"
	 data-module="<?php 
echo esc_attr( $optin_goal );
?>" data-type="<?php 
echo esc_attr( $type );
?>"
	 id="<?php 
echo esc_attr( $xoptin_id );
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
	 data-id="<?php 
echo esc_attr( $xoptin_id );
?>" <?php 
echo wp_kses_post( $attr );
?>
	<?php 
?>
	 data-timer_date="<?php 
echo esc_attr( $WPOptins->wpop_get_settings(
    $xoptin_id,
    'timer-enddate',
    false,
    false,
    $is_child
) );
?>">

		<?php 
/*
 * Populate HTML according to type
 */
switch ( $type ) {
    case 'popup':
        ?>

                <div class="wpop-popup-content-wrapper">

					<?php 
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
            do_action( 'wpop_custom_popup_before_image', $instance );
            ?>

                            <img src="<?php 
            echo esc_url( apply_filters( 'wpop_custom_popup_image_url', $feat_img, $instance ) );
            ?>"/>

							<?php 
            do_action( 'wpop_custom_popup_after_image', $instance );
            ?>

                        </div>

					<?php 
        }
        ?>
                    <div class="wpop-popup-content-holder">
                        <div class="xo_front_c">
							<?php 
        /* If timer active. */
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'timer-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

                                <div class="xo_timer_wrap">

									<?php 
            do_action( 'wpop_custom_popup_before_timer', $instance );
            ?>

									<?php 
            if ( $WPOptins->wpop_get_settings(
                $xoptin_id,
                'enable-timer-title',
                false,
                false,
                $is_child
            ) == 'on' ) {
                ?>
                                        <p> <?php 
                echo esc_html( apply_filters( 'wpop_custom_popup_timer_text', $WPOptins->wpop_get_settings(
                    $xoptin_id,
                    'timer-text',
                    false,
                    false,
                    $is_child
                ), $instance ) );
                ?> </p>
									<?php 
            }
            ?>

                                    <span class="wopop_timer_clock"></span>

									<?php 
            do_action( 'wpop_custom_popup_after_timer', $instance );
            ?>

                                </div>

							<?php 
        }
        ?>

                            <div class="xo_offer_c_wrap">

								<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'content-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

									<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

                                        <div class="xo_offer_c">

											<?php 
                do_action( 'wpop_custom_popup_before_content', $instance );
                ?>

                                            <p><?php 
                echo wp_kses_post( apply_filters( 'wpop_custom_popup_content', $content, $instance ) );
                ?></p>

											<?php 
                do_action( 'wpop_custom_popup_after_content', $instance );
                ?>

                                        </div>
									<?php 
            }
            ?>
								<?php 
        }
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'cupon-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>
									<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

                                        <div class="xo_cupon_wrap">

											<?php 
                do_action( 'wpop_custom_popup_before_coupon', $instance );
                ?>

                                            <span><?php 
                echo esc_html( apply_filters( 'wpop_custom_popup_coupon', $cupon, $instance ) );
                ?></span>

											<?php 
                do_action( 'wpop_custom_popup_after_coupon', $instance );
                ?>
                                        </div>
									<?php 
            }
        }
        ?>

                            </div>

							<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'button-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

                                <div class="xo_offer_btn">

									<?php 
            do_action( 'wpop_custom_popup_before_button', $instance );
            ?>

                                    <a href="<?php 
            echo esc_url( apply_filters( 'wpop_custom_popup_button_url', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-url',
                false,
                false,
                $is_child
            ), $instance ) );
            ?>"
                                       class="xo_offer_cta">

										<?php 
            echo esc_html( apply_filters( 'wpop_custom_popup_button_text', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-text',
                false,
                false,
                $is_child
            ), $instance ) );
            ?></a>

									<?php 
            do_action( 'wpop_custom_popup_after_button', $instance );
            ?>

                                </div>

							<?php 
        }
        ?>
                        </div>
                    </div>

					<?php 
        do_action( 'wpop_custom_popup_after', $instance );
        ?>
                </div>

				<?php 
        break;
    case 'wellcome_matt':
        ?>

                <div class="wppop-wellcome-matt-container">
                    <div class="wppop-wellcome-matt-inner">

						<?php 
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
            do_action( 'wpop_custom_wellcome_matt_before_image', $instance );
            ?>

                                <img src="<?php 
            echo esc_url( apply_filters( 'wpop_custom_wellcome_matt_image_url', $feat_img, $instance ) );
            ?>"/>

								<?php 
            do_action( 'wpop_custom_wellcome_matt_after_image', $instance );
            ?>

                            </div>

						<?php 
        }
        ?>
                        <div class="wpop-popup-content-holder">
                            <div class="xo_front_c">
								<?php 
        /* If timer active. */
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'timer-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

                                    <div class="xo_timer_wrap">

										<?php 
            do_action( 'wpop_custom_wellcome_matt_before_timer', $instance );
            ?>
										<?php 
            if ( $WPOptins->wpop_get_settings(
                $xoptin_id,
                'enable-timer-title',
                false,
                false,
                $is_child
            ) == 'on' ) {
                ?>
                                            <p> <?php 
                echo esc_html( apply_filters( 'wpop_custom_wellcome_matt_timer_text', $WPOptins->wpop_get_settings(
                    $xoptin_id,
                    'timer-text',
                    false,
                    false,
                    $is_child
                ), $instance ) );
                ?> </p>
										<?php 
            }
            ?>
                                        <span class="wopop_timer_clock"></span>

										<?php 
            do_action( 'wpop_custom_wellcome_matt_after_timer', $instance );
            ?>

                                    </div>

								<?php 
        }
        ?>

                                <div class="xo_offer_c_wrap">

									<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'content-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

										<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

                                            <div class="xo_offer_c">

												<?php 
                do_action( 'wpop_custom_wellcome_matt_before_content', $instance );
                ?>

                                                <p><?php 
                echo wp_kses_post( apply_filters( 'wpop_custom_wellcome_matt_content', $content, $instance ) );
                ?></p>

												<?php 
                do_action( 'wpop_custom_wellcome_matt_after_content', $instance );
                ?>

                                            </div>
										<?php 
            }
            ?>
									<?php 
        }
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'cupon-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>
										<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

                                            <div class="xo_cupon_wrap">

												<?php 
                do_action( 'wpop_custom_popup_before_coupon', $instance );
                ?>

                                                <span><?php 
                echo wp_kses_post( apply_filters( 'wpop_custom_wellcome_matt_coupon', $cupon, $instance ) );
                ?></span>

												<?php 
                do_action( 'wpop_custom_wellcome_matt_after_coupon', $instance );
                ?>
                                            </div>
										<?php 
            }
        }
        ?>

                                </div>

								<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'button-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

                                    <div class="xo_offer_btn">

										<?php 
            do_action( 'wpop_custom_wellcome_matt_before_button', $instance );
            ?>

                                        <a href="<?php 
            echo esc_url( apply_filters( 'wpop_custom_popup_button_url', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-url',
                false,
                false,
                $is_child
            ), $instance ) );
            ?>"
                                           class="xo_offer_cta">

											<?php 
            echo esc_html( apply_filters( 'wpop_custom_popup_button_text', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-text',
                false,
                false,
                $is_child
            ), $instance ) );
            ?></a>
										<?php 
            do_action( 'wpop_custom_wellcome_matt_after_button', esc_html( $instance ) );
            ?>

										</div>

										<?php 
        }
        ?>
										</div>
										</div>

										<?php 
        do_action( 'wpop_custom_wellcome_matt_after', esc_html( $instance ) );
        ?>
										</div>
										</div>

										<?php 
        break;
    case 'slide_in':
        ?>

										<?php 
        ?>

										<div class="xo_front_c">
											<?php 
        /* If timer active. */
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'timer-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

												<div class="xo_timer_wrap">

													<?php 
            do_action( 'wpop_custom_slide_in_before_timer', esc_html( $instance ) );
            ?>
													<?php 
            if ( $WPOptins->wpop_get_settings(
                $xoptin_id,
                'enable-timer-title',
                false,
                false,
                $is_child
            ) == 'on' ) {
                ?>

														<p> <?php 
                echo esc_html( apply_filters( 'wpop_custom_slide_in_timer_text', $WPOptins->wpop_get_settings(
                    $xoptin_id,
                    'timer-text',
                    false,
                    false,
                    $is_child
                ), esc_html( $instance ) ) );
                ?> </p>
													<?php 
            }
            ?>

													<span class="wopop_timer_clock"></span>

													<?php 
            do_action( 'wpop_custom_slide_in_after_timer', esc_html( $instance ) );
            ?>

												</div>

											<?php 
        }
        ?>

											<div class="xo_offer_c_wrap">

												<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'content-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

													<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

														<div class="xo_offer_c">

															<?php 
                do_action( 'wpop_custom_slide_in_before_content', esc_html( $instance ) );
                ?>

															<p><?php 
                echo wp_kses_post( apply_filters( 'wpop_custom_slide_in_content', esc_html( $content ), esc_html( $instance ) ) );
                ?></p>

															<?php 
                do_action( 'wpop_custom_slide_in_after_content', esc_html( $instance ) );
                ?>

														</div>
													<?php 
            }
            ?>
												<?php 
        }
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'cupon-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>
													<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

														<div class="xo_cupon_wrap">

															<?php 
                do_action( 'wpop_custom_popup_before_coupon', esc_html( $instance ) );
                ?>

															<span><?php 
                echo esc_html( apply_filters( 'wpop_custom_slide_in_coupon', esc_html( $cupon ), esc_html( $instance ) ) );
                ?></span>

															<?php 
                do_action( 'wpop_custom_slide_in_after_coupon', esc_html( $instance ) );
                ?>
														</div>
													<?php 
            }
        }
        ?>

											</div>

											<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'button-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

												<div class="xo_offer_btn">

													<?php 
            do_action( 'wpop_custom_slide_in_before_button', esc_html( $instance ) );
            ?>

													<a href="<?php 
            echo esc_url( apply_filters( 'wpop_custom_popup_button_url', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-url',
                false,
                false,
                $is_child
            ), esc_html( $instance ) ) );
            ?>"
													   class="xo_offer_cta">

														<?php 
            echo esc_html( apply_filters( 'wpop_custom_popup_button_text', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-text',
                false,
                false,
                $is_child
            ), esc_html( $instance ) ) );
            ?></a>

													<?php 
            do_action( 'wpop_custom_slide_in_after_button', esc_html( $instance ) );
            ?>

												</div>

											<?php 
        }
        ?>
											<div id="xo_close"><i class="icon mt-times"></i></div>

											<?php 
        if ( wpop_fs()->is_free_plan() ) {
            ?>
												<div title="<?php 
            echo esc_attr( __( 'Powered by WPOptin', 'wpoptin' ) );
            ?>"
													 style="cursor: pointer;opacity: .8 !important;display: block !important; z-index: 999999 !important; position: absolute;left: auto;right: auto;text-align: center;margin-left: auto;margin-right: auto;bottom: -45px;left: 50%;-webkit-transform: translate(-50%, 0);-ms-transform: translate(-50%, 0); transform: translate(-50%, 0);"
													 data-class="wpop_redirect_home"
													 data-id="wpop_bar_branding"
													 data-wpop-inverted-img="<?php 
            echo esc_attr( esc_url( WPOP_URL ) );
            ?>/assets/images/wpoptin-logo.png"
													 data-wpop-real-img="<?php 
            echo esc_attr( esc_url( WPOP_URL ) );
            ?>/assets/images/wpoptin-logo.png">
													<img style="width: 35px;opacity: 1 !important;display: block !important;z-index: 999999 !important;"
														 src="<?php 
            echo esc_attr( esc_url( WPOP_URL ) );
            ?>/assets/images/wpoptin-logo.png"/>
												</div>
											<?php 
        }
        ?>

										</div>

										<?php 
        do_action( 'wpop_custom_slide_in_after', esc_html( $instance ) );
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
													 style="cursor: pointer;opacity: .8 !important;display: block !important; z-index: 999999 !important; position: absolute;left: 25px;top: 50%;transform: translate(0, -50%);transform: translate(0, -50%); -webkit-transform:translate(0, -50%);-ms-transform:translate(0, -50%);"
													 data-class="wpop_redirect_home"
													 data-id="wpop_bar_branding"
													 data-wpop-inverted-img="<?php 
            echo esc_url( WPOP_URL );
            ?>/assets/images/wpoptin-dark-gray-logo.png"
													 data-wpop-real-img="<?php 
            echo esc_url( WPOP_URL );
            ?>/assets/images/wpop-gray-logo.png">
													<img style="width: 35px;opacity: 1 !important;display: block !important;z-index: 999999 !important;"
														 src="<?php 
            echo esc_url( WPOP_URL );
            ?>/assets/images/wpop-gray-logo.png"/>
												</div>
											<?php 
        }
        ?>
											<?php 
        /* If timer active. */
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'timer-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

												<div class="xo_timer_wrap">

													<?php 
            do_action( 'wpop_custom_bar_before_timer', esc_html( $instance ) );
            ?>

													<?php 
            if ( $WPOptins->wpop_get_settings(
                $xoptin_id,
                'enable-timer-title',
                false,
                false,
                $is_child
            ) == 'on' ) {
                ?>

														<p> <?php 
                echo esc_html( apply_filters( 'wpop_custom_bar_timer_text', $WPOptins->wpop_get_settings(
                    $xoptin_id,
                    'timer-text',
                    false,
                    false,
                    $is_child
                ), esc_html( $instance ) ) );
                ?> </p>
													<?php 
            }
            ?>
													<span class="wopop_timer_clock"></span>

													<?php 
            do_action( 'wpop_custom_bar_after_timer', esc_html( $instance ) );
            ?>
												</div>

											<?php 
        }
        ?>

											<div class="xo_offer_c_wrap">

												<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'content-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

													<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

														<div class="xo_offer_c">

															<?php 
                do_action( 'wpop_custom_bar_before_content', esc_html( $instance ) );
                ?>

															<p><?php 
                echo wp_kses_post( apply_filters( 'wpop_custom_bar_content', esc_html( $content ), esc_html( $instance ) ) );
                ?></p>

															<?php 
                do_action( 'wpop_custom_bar_after_content', esc_html( $instance ) );
                ?>

														</div>
													<?php 
            }
            ?>
												<?php 
        }
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'cupon-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>
													<?php 
            if ( isset( $content ) && !empty( $content ) ) {
                ?>

														<div class="xo_cupon_wrap">

															<?php 
                do_action( 'wpop_custom_bar_before_coupon', esc_html( $instance ) );
                ?>

															<span><?php 
                echo esc_html( apply_filters( 'wpop_custom_bar_coupon', esc_html( $cupon ), esc_html( $instance ) ) );
                ?></span>

															<?php 
                do_action( 'wpop_custom_bar_after_coupon', esc_html( $instance ) );
                ?>

														</div>
													<?php 
            }
        }
        ?>

											</div>

											<?php 
        if ( $WPOptins->wpop_get_settings(
            $xoptin_id,
            'button-enable',
            false,
            false,
            $is_child
        ) ) {
            ?>

												<div class="xo_offer_btn">

													<?php 
            do_action( 'wpop_custom_bar_before_button', esc_html( $instance ) );
            ?>

													<a href="<?php 
            echo esc_url( apply_filters( 'wpop_custom_bar_button_url', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-url',
                false,
                false,
                $is_child
            ), esc_html( $instance ) ) );
            ?>"
													   class="xo_offer_cta">

														<?php 
            echo esc_html( apply_filters( 'wpop_custom_bar_button_text', $WPOptins->wpop_get_settings(
                $xoptin_id,
                'offer-btn-text',
                false,
                false,
                $is_child
            ), esc_html( $instance ) ) );
            ?></a>

													<?php 
            do_action( 'wpop_custom_bar_after_button', esc_html( $instance ) );
            ?>

												</div>

											<?php 
        }
        ?>

											<div id="xo_close"><i class="icon mt-times"></i></div>
										</div>
										<?php 
        break;
}
?>


										</div>
										</div>
