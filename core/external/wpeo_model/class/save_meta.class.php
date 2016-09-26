<?php if ( !defined( 'ABSPATH' ) ) exit;

class save_meta_class extends singleton_util {
	protected function construct() {}

	public static function save_meta_data( $object, $function, $meta_key ) {
		$schema = $object->get_model();

		$list_meta_json = array();

		if ( !empty( $object->id ) ) {
			foreach ( $schema as $field_name => $field_def ) {
				if ( !empty( $field_def['meta_type'] ) && isset( $object->$field_name ) ) {
					if ( $field_def['meta_type'] == 'single' ) {
						self::g()->save_single_meta_data( $object->id, $object->$field_name, $function, $field_def['field'] );
					}
					else {
						$list_meta_json[$field_name] = $object->$field_name;
					}
				}
			}

			self::g()->save_multiple_meta_data( $object->id, $list_meta_json, $function, $meta_key );
		}
	}

	private function save_single_meta_data( $id, $value, $function, $meta_key ) {
		call_user_func( $function, $id, $meta_key, $value );
		eo_log( 'digi-post-meta', array(
			'object_id' => $data->id,
			'message' => 'Saved post meta (single) : ' . $meta_key . ' => ' . $value
		) );
	}

	private function save_multiple_meta_data( $id, $array_value, $function, $meta_key ) {
		$data = json_encode( $array_value );
		$data = preg_replace_callback(
		    '/\\\\u([0-9a-f]{4})/i',
		    function ($matches) {
		        $sym = mb_convert_encoding(
		                pack('H*', $matches[1]),
		                'UTF-8',
		                'UTF-16'
		                );
			    return $sym;
		    },
		    $data
		);

		call_user_func( $function, $id, $meta_key, $data );
		eo_log( 'digi-post-meta', array(
			'object_id' => $data->id,
			'message' => 'Saved post meta (multiple) : ' . $meta_key . ' => ' . $data
		) );
	}
}
