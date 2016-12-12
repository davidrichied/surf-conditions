<?php
class Surf_Conditions_AjaxFunctions{

  private $curlWrapClass;

  public function __construct() {}

	//Get the data from the MSW API
	//Ajax calls this function
	function sc_get_api_data() {
		$sc_options = get_option('sc_options');
		$sc_api_key = $sc_options["sc_api_key"];
		$sc_location_id = $sc_options["sc_location_id"];
		$surf_data = file_get_contents("http://magicseaweed.com/api/" . $sc_api_key . "/forecast/?spot_id=" . $sc_location_id . "&units=US&fields=swell.*,timestamp,wind.*");
		echo json_encode($surf_data, true);
		wp_die();
	}
}