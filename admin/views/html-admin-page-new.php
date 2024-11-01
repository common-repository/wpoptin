<?php
/**
 * Admin View: Page - New
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpoptins;
$WPOptins = new WPOptins();
$campaign_publish_text = 'Publish';
$status = 'draft';

if ( isset( $_GET['wpop_optin_id'] ) ) {
	$wpoptin_id = (int) sanitize_text_field( $_GET['wpop_optin_id'] );
	$status = get_post_status ( $wpoptin_id );
	if ( $status == 'publish' ) {
		$campaign_publish_text = __( 'Switch to draft', 'wpoptin' );
	}else{
		$campaign_publish_text = __( 'Publish', 'wpoptin' );
	}
}else{
    $wpoptin_id = null;
}

if ( isset( $_GET['goal'] ) ) {
	$goal = (string) sanitize_text_field( $_GET['goal'] );
}

if ( isset( $_GET['is_child'] ) && $_GET['is_child'] == 'true' ) {
	$is_child = true;
}

if ( ! isset( $wpoptin_id ) and ! isset( $goal ) ) {
	$new_class = 'xo_new_wrap';
	$fulls = '';
} else {
	$new_class = 'xo_edit_wrap';
	$fulls     = 'xo_fullscreen';
}

if ( isset( $goal ) ) {
    $goal = $goal;
} else {
    $goal = '';
}

$wpoptin_post_status = get_post_status($wpoptin_id);

?>
<div class="xo_wrap  xo_wraper_new_page <?php echo esc_attr( $new_class ); ?> <?php echo esc_attr( $fulls ); ?>">
  <span class="xo_loader_holder">
    <img class="loader_img fadeIn"
         src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpoptin-logo.png">
  </span>
    <div class="xo_header fadeIn">
        <div class="xo_sliders_wrap">
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpoptin' ) ) ?>">
                <img src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpop-menu-icon.png"/>
            </a>
        </div>
        <div class="xo-addnew-right">
            <a href="<?php echo esc_url( site_url() ); ?>" target="_blank" id="wpop-preview" class="components-button has-icon wpop-no-preview-icon <?php if( isset( $wpoptin_id ) && !empty( $wpoptin_id ) && $wpoptin_post_status == 'publish' ){  ?> wpop-preview-icon <?php } ?> " title="Preview"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" aria-hidden="true" focusable="false">
                    <path d="M19.5 4.5h-7V6h4.44l-5.97 5.97 1.06 1.06L18 7.06v4.44h1.5v-7Zm-13 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-3H17v3a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h3V5.5h-3" fill="white"></path>
                </svg>
            </a>
            <button class="wpop-publish-campaign <?php if( isset( $wpoptin_id ) && !empty( $wpoptin_id ) ){  ?> wpop-publish-campaign-show <?php } ?>" data-id="<?php echo esc_attr( $wpoptin_id ); ?>" data-status="<?php echo esc_attr( $status ); ?>">
                <?php echo esc_html( $campaign_publish_text ); ?>
            </button>
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpoptin' ) ) ?>"
               class="xo-close" data-position="bottom">
                <i class="material-icons">close
                </i>
            </a>
        </div>
    </div>
    <div class="xo-settings fadeIn">
        <!-- Froms content starts. -->
        <div class="xo_new_holder <?php echo esc_attr( $goal ); ?>">
            <div class="mdl-tabs__tab-bar">
                <ul id="sortable-units" class="xo-tabs tabs" style="">
                    <li class="xo-tab  xo-tab-parent tab_1">
                        <a href="#" class="xo-tab-link">
							<?php esc_html_e( 'WPoptin Configuration', 'wpoptin' ); ?>
                        </a>
                    </li>
                    <li class="xo-tab tab tab_2 xo_acount_tab">
                        <a href="#accounts-panel" class="mdl-tabs__tab">
                            <i class="material-icons" aria-hidden="true">account_circle
                            </i>
							<?php esc_html_e( "Accounts", 'wpoptin' ); ?>
                        </a>
                    </li>
                    <li class="xo-tab tab tab_2 xo_content_tab">
                        <a href="#content-panel" class="mdl-tabs__tab active">
                            <i class="material-icons" aria-hidden="true">assignment
                            </i>
							<?php esc_html_e( "Content", 'wpoptin' ); ?>
                        </a>
                    </li>
                    <li class="xo-tab tab tab_3 xo_triggers_tab">
                        <a href="#triggers-panel" class="mdl-tabs__tab">
                            <i class="material-icons" aria-hidden="true">device_hub
                            </i>
							<?php esc_html_e( "Triggers & Conditions", 'wpoptin' ); ?>
                        </a>
                    </li>
                    <li class="xo-tab tab tab_4" id="xo_design_tab">
                        <a href="#design-panel"
                           class="mdl-tabs__tab <?php if ( ! isset( $wpoptin_id ) ): ?> disabled <?php endif; ?>">
                            <i class="material-icons" aria-hidden="true">brush
                            </i>
							<?php esc_html_e( "Design", 'wpoptin' ); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="xo-tab-content">
				<?php include_once WPOP_DIR . 'admin/views/html-accounts-tab.php'; ?>
				<?php include_once WPOP_DIR . 'admin/views/html-content-tab.php'; ?>
				<?php include_once WPOP_DIR . 'admin/views/html-design-tab.php'; ?>
				<?php include_once WPOP_DIR . 'admin/views/html-triggers-conditions-tab.php'; ?>
            </div>
        </div>
    </div>
	<?php if ( ! isset( $_GET['wpop_optin_id'] ) and ! isset( $_GET['goal'] ) ){ ?>
    <div class="wpop_new_goals">
        <div class="wpop_new_goals_wrap">
            <div class="row wpop-goals-holder">
                <h4>
					<?php esc_html_e( 'What’s your goal?', 'wpoptin' ); ?>
                </h4>

                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Collect emails', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Display optin form to collect emails to grow your subscribers list by 10x.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="optin">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Get Phone Calls', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Display call now button to get calls/leads by 10x than usual call now button.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="phone_calls">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3 wpop-goal-holder xo_goal_holder xo_offer_goal">
                    <div class="card">

                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Sales, promotions and discount offers', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Promote the special offers on sales occasions like HalloWeen or New Year by giving discounts and perks.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="offer_bar">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">

                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Announcement', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Display important announcements and latest news.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="announcement">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row wpop-goals-holder">
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">

                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Social Traffic', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Get 10x more likes for site page or Facebook fan page by displaying the Facebook like button.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="social_traffic">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
	            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                    <div class="col s3 wpop-goal-holder woo-product-card">
                        <div class="card">
                            <div class="card-content">
                                <h5>
						            <?php esc_html_e( "Woocommerce Product", 'wpoptin' ); ?>
                                </h5>
                                <p>
						            <?php esc_html_e( "Showcase WooCommerce products.", 'wpoptin' ); ?>
                                </p>
                                <a class="waves-effect waves-light btn wpop-select-goal"
                                   data-goal="woo_product">
                                    <i class="material-icons right">chevron_right
                                    </i>
						            <?php esc_html_e( "Select", 'wpoptin' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
	            <?php }else{ ?>
                    <div class="col s3 wpop-goal-holder woo-product-card">
                        <div class="card">
                            <a href="#wpop-activate-woocommerce" class="modal-trigger">
                                <div class="wpop-content-locked"></div>
                            </a>
                            <div id="wpop-activate-woocommerce"
                                 class="modal wpop-upgrade-modal">
                                <div class="modal-content">
                                    <div class="wpop-modal-content">
                                        <h5><?php esc_html_e( "WooCommerce is currently inactive.", 'wpoptin' ); ?></h5>
                                        <p><?php esc_html_e( "The WooCommerce plugin is presently not activated. Please activate the plugin. If you haven't installed the plugin yet, you can download it using the link provided below.", 'wpoptin' ); ?></p>
                                        <a href="<?php echo esc_url('https://wordpress.org/plugins/woocommerce/') ?>"
                                           target="_blank" class="waves-effect waves-light btn z-depth-3"><i class="material-icons right">chevron_right
                                            </i><?php esc_html_e( "Get Woocommerce", 'wpoptin' ); ?>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <h5>
						            <?php esc_html_e( "Woocommerce Product", 'wpoptin' ); ?>
                                </h5>
                                <p>
						            <?php esc_html_e( "Showcase WooCommerce products.", 'wpoptin' ); ?>
                                </p>
                                <a href="<?php echo esc_url('https://wordpress.org/plugins/woocommerce/') ?>"
                                   target="_blank" class="waves-effect waves-light btn z-depth-3"><i class="material-icons right">chevron_right
                                    </i><?php esc_html_e( "Get WooCommerce", 'wpoptin' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
	            <?php }?>
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">

                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Custom', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Not sure? Use our custom module according to your requirements and imagination. ', 'wpoptin' ); ?>
                            </p>

                            <a class="waves-effect waves-light btn wpop-select-goal"
                               data-goal="custom">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Goals Html ends here-->
            <div class="wpop-types-holder row wpop-goals-holder">
                <h4>
					<?php esc_html_e( 'Choose Type', 'wpoptin' ); ?>
                </h4>
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpop-bar-icon.svg">
                        </div>
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Bar', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'A scrolling bar at the top of your site to increase conversion.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-type-new"
                               data-href="<?php echo esc_url( admin_url( 'admin.php?page=wpop_new&goal=' ) ) ?>"
                               data-type="bar">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpop-popup-icon.svg">
                        </div>
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Lightbox popup', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'A pop up or modal window in the center of your site. Very popular and very effective.', 'wpoptin' ); ?>
                            </p>

                            <a class="waves-effect waves-light btn wpop-select-type-new"
                               data-href="<?php echo esc_url( admin_url( 'admin.php?page=wpop_new&goal=' ) )?>"
                               data-type="popup">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpop-slidein-icon.svg">
                        </div>
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Slide In', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'Alternative to PopUp and less distracting but still highly converting slide in box in the corner of your site.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-type-new"
                               data-href="<?php echo esc_url( admin_url( 'admin.php?page=wpop_new&goal=' ) ) ?>"
                               data-type="slide_in">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 wpop-goal-holder">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo esc_url( WPOP_URL ); ?>/assets/images/wpop-welcome-matt-icon.svg">
                        </div>
                        <div class="card-content">
                            <h5>
								<?php esc_html_e( 'Welcome Mat', 'wpoptin' ); ?>
                            </h5>
                            <p>
								<?php esc_html_e( 'A full site screen take over with your selected goal which can’t be ignored.', 'wpoptin' ); ?>
                            </p>
                            <a class="waves-effect waves-light btn wpop-select-type-new"
                               data-href="<?php echo esc_url( admin_url( 'admin.php?page=wpop_new&goal=' ) )?>"
                               data-type="wellcome_matt">
                                <i class="material-icons right">chevron_right
                                </i>
								<?php esc_html_e( 'Select', 'wpoptin' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="wpop-selected-goal" value=""/>
            </div>
            <!-- Types Html ends here-->
        </div>
    </div>
</div>
<?php } ?>
</div>
</div>