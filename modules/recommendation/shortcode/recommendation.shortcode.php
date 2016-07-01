<?php
/**
* Ajoutes un shortcode qui permet d'afficher la liste de tous les risques d'un établissement.
* Et un formulaire qui permet d'ajouter un risque
*
* @author Jimmy Latour <jimmy.latour@gmail.com>
* @version 0.1
* @copyright 2015-2016 Eoxia
* @package risk
* @subpackage shortcode
*/

if ( !defined( 'ABSPATH' ) ) exit;

class recommendation_shortcode {
	public function __construct() {
		add_shortcode( 'digi-recommendation', array( $this, 'callback_digi_recommendation' ) );
	}

	public function callback_digi_recommendation( $param ) {
		$element_id = $param['post_id'];
    $element = society_class::get()->show_by_type( $element_id );

		$list_recommendation_category = recommendation_category_class::get()->index();
		$list_recommendation_in_workunit = $element->option['associated_recommendation'];
		require( DIGI_RECOM_TEMPLATES_MAIN_DIR . 'list.php' );
	}
}

new recommendation_shortcode();
