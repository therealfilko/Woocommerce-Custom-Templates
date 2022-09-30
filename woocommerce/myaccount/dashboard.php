<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="ct-section-inner-wrap">
   <div id="div_block-28-212" class="ct-div-block buchung_starten">
      <h5 id="headline-32-212" class="ct-headline">Reparatur jetzt buchen</h5>
      <div id="fancy_icon-30-212" class="ct-fancy-icon">
         <svg id="svg-fancy_icon-30-212">
            <use xlink:href="#FontAwesomeicon-chevron-right"></use>
         </svg>
      </div>
   </div>
   <a id="div_block-16-212" class="ct-link dashboard-card" href="/buchungen/">
      <div id="fancy_icon-24-212" class="ct-fancy-icon dashboard-icon">
         <svg id="svg-fancy_icon-24-212">
            <use xlink:href="#FontAwesomeicon-th-list"></use>
         </svg>
      </div>
      <h5 id="headline-18-212" class="ct-headline dashboard-card-link">Buchungen<br>ansehen</h5>
   </a>
   <div id="div_block-5-212" class="ct-div-block">
      <a id="div_block-6-212" class="ct-link dashboard-card" href="/bearbeiten/">
         <div id="fancy_icon-22-212" class="ct-fancy-icon dashboard-icon">
            <svg id="svg-fancy_icon-22-212">
               <use xlink:href="#FontAwesomeicon-user"></use>
            </svg>
         </div>
         <h5 id="headline-12-212" class="ct-headline dashboard-card-link">Profil<br>bearbeiten</h5>
      </a>
      <a id="div_block-19-212" class="ct-link dashboard-card" href="/adresse-bearbeiten/">
         <div id="fancy_icon-23-212" class="ct-fancy-icon dashboard-icon">
            <svg id="svg-fancy_icon-23-212">
               <use xlink:href="#FontAwesomeicon-address-card"></use>
            </svg>
         </div>
         <h5 id="headline-21-212" class="ct-headline dashboard-card-link">Adresse<br>bearbeiten</h5>
      </a>
   </div>
</div>
<!--
<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	?>
</p>
-->
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

