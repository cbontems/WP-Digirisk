<?php
/**
 * Une unité de travail
 *
 * @package Evarisk\Plugin
 */

namespace digi;

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<li class="unit-header"
	data-workunit-id="<?php echo esc_attr( $workunit->id ); ?>"
	data-type="<?php echo esc_attr( $workunit->type ); ?>">

	<?php do_shortcode( '[eo_upload_button id=' . $workunit->id . ' type=' . $workunit->type . ']' ); ?>

	<span
		data-nonce="<?php echo esc_attr( wp_create_nonce( 'load_right_container' ) ); ?>"
		data-action="load_society"
		data-groupment-id="<?php echo $workunit->parent_id; ?>"
		data-workunit-id="<?php echo esc_attr( $workunit->id ); ?>"
		class="action-attribute title">
		<strong><?php echo esc_html( $workunit->unique_identifier ); ?> -</strong>
		<span title="<?php echo esc_attr( $workunit->title ); ?>"><?php echo esc_html( $workunit->title ); ?></span>
	</span>


	<span class="delete button w50"
		data-id="<?php echo esc_attr( $workunit->id ); ?>"
		data-nonce="<?php echo esc_attr( wp_create_nonce( 'ajax_delete_workunit_' . $workunit->id ) ); ?>"
		data-action="delete_society">
		<i class="icon dashicons dashicons-no-alt"></i>
	</span>
</li>
