<?php
/**
 * Les actions relatives aux accident de travail benin (ODT)
 *
 * @author Jimmy Latour <jimmy@evarisk.com>
 * @since 6.3.0
 * @version 6.3.0
 * @copyright 2015-2017 Evarisk
 * @package DigiRisk
 */

namespace digi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Les actions relatives aux accident de travail benin (ODT)
 */
class Registre_Accident_Travail_Benin_Action {

	/**
	 * Le constructeur ajoutes l'action wp_ajax_generate_registre_accidents_travail_benins
	 *
	 * @since 6.3.0
	 * @version 6.3.0
	 */
	public function __construct() {
		add_action( 'wp_ajax_generate_registre_accidents_travail_benins', array( $this, 'ajax_generate_registre_accidents_travail_benins' ) );
	}

	/**
	 * Appel la méthode "generate" de "Accident_Travail_Benin" afin de générer l'accident de travail bénin (ODT).
	 *
	 * @return void
	 *
	 * @since 6.3.0
	 * @version 6.3.0
	 */
	function ajax_generate_registre_accidents_travail_benins() {
		check_ajax_referer( 'generate_registre_accidents_travail_benins' );

		Registre_Accidents_Travail_Benins_Class::g()->generate();

		ob_start();
		Registre_Accidents_Travail_Benins_Class::g()->display();
		wp_send_json_success( array(
			'namespace' => 'digirisk',
			'module' => 'accident',
			'callback_success' => 'generatedRegistreAccidentBenin',
			'view' => ob_get_clean(),
		) );
	}

}

new Registre_Accident_Travail_Benin_Action();
