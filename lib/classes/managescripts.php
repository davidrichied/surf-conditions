<?php
class Surf_Conditions_ManageScripts {

  private $pluginUrl;

  public function __construct($pluginUrl)
  {
      $this->pluginUrl = $pluginUrl;
  }

  public function enqueueSC_Scripts($hook) {
			wp_enqueue_style( 'sc-styles', $this->pluginUrl . 'css/surf-conditions.css');

			wp_register_script (
				'sc-js', 
				$this->pluginUrl . 'js/surf-conditions.js',
				array( 'jquery' ),
				'',
				true
			);
		  wp_enqueue_script('sc-js');

			wp_localize_script( 'sc-js', 'sc_ajax', array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' )
			));
	}
}