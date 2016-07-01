<?php
/**
* Inspecteur du travail
*
* @author Jimmy Latour <jimmy.latour@gmail.com>
* @version 0.1
* @copyright 2015-2016 Eoxia
* @package legal_display
* @subpackage templates
*/

if ( !defined( 'ABSPATH' ) ) exit; ?>

<ul class="wp-digi-form">
  <li><h2><?php _e( 'Detective work', 'digirisk' ); ?></h2></li>
  <li>
    <label>
      <?php _e( 'Last name and first name', 'digirisk' ); ?>
      <input name="detective_work[full_name]" type="text" value="<?php echo $data['detective_work']->option['full_name']; ?>" />
    </label>
  </li>
  <li>
    <label>
      <?php _e( 'Address', 'digirisk' ); ?>
      <input name="detective_work[address][address]" type="text" value="<?php echo $data['detective_work']->address->option['address']; ?>" />
    </label>
  </li>
  <li>
    <label>
      <?php _e( 'Postcode', 'digirisk' ); ?>
      <input name="detective_work[address][postcode]" type="text" value="<?php echo $data['detective_work']->address->option['postcode']; ?>" />
    </label>
  </li>
  <li>
    <label>
      <?php _e( 'City', 'digirisk' ); ?>
      <input name="detective_work[address][town]" type="text" value="<?php echo $data['detective_work']->address->option['town']; ?>" />
    </label>
  </li>
  <li>
    <label>
      <?php _e( 'Phone', 'digirisk' ); ?>
      <input name="detective_work[contact][phone]" type="text" value="<?php echo !empty( $data['detective_work']->option['contact']['phone'][0] ) ? $data['detective_work']->option['contact']['phone'][0] : ''; ?>" />
    </label>
  </li>
  <li>
    <label>
      <?php _e( 'Horaires', 'digirisk' ); ?>
      <input name="detective_work[opening_time]" type="text" value="<?php echo $data['detective_work']->option['opening_time']; ?>"/>
    </label>
  </li>
</ul>
