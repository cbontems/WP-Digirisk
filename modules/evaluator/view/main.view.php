<?php
/**
 * La vue contenant les deux blocs pour afficher les évaluateurs
 *
 * @author Evarisk <dev@evarisk.com>
 * @since 6.2.3
 * @copyright 2015-2018 Evarisk
 * @package DigiRisk
 */

namespace digi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $eo_search; ?>

<?php
\eoxia\View_Util::exec( 'digirisk', 'evaluator', 'list', array(
	'element'                 => $element,
	'element_id'              => $element->data['id'],
	//'current_page'            => $current_page,
	//'number_page'             => $number_page,
	//'list_affected_evaluator' => $list_affected_evaluator,
	'evaluators'              => $evaluators,
) );
?>
