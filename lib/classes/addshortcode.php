<?php
class Surf_Conditions_AddShortcode {

	public function __construct() {}

	/**
	 * Static Singleton Factory Method
	 *
	 * @since  4.1
	 * @return Tribe__Events__Shortcode__Event_Details
	 */
	public static function instance() {
		static $instance;

		if ( ! $instance ) {
			$instance = new self;
		}

		return $instance;
	}

	/**
	 * Add the necessary hooks at the correct moment in WordPress
	 *
	 * @since  4.1
	 * @return  void
	 */
	public static function hook() {
		$myself = self::instance();

		add_action( 'init', array( $myself, 'add_shortcode' ) );
	}
	/**
	 * This will be called at hook "init" to allow other plugins and themes to hook to shortcode easily
	 *
	 * @since 4.1
	 * @return void
	 */
	public function add_shortcode() {
		add_shortcode( 'surf_conditions', array( $this, 'do_shortcode' ) );
	}

	/**
	 * Actually create the shortcode output
	 *
	 * @since  4.1
	 *
	 * @param  array $args    The Shortcode arguments
	 *
	 * @return string
	 */
	public function do_shortcode( $args ) {

		$sc_options = get_option('sc_options');
		$sc_surf_temperature_id = $sc_options["sc_surf_temperature_id"];
		// Start to record the Output
		ob_start(); ?>

	<script type="text/javascript">// <![CDATA[
		sea_temperature_c1="333"; sea_temperature_c2="rgba(0,0,0,1)"; sea_temperature_s1=15; sea_temperature_s2=20; sea_temperature_i1=0; sea_temperature_f1=1; sea_temperature_l1=0;
		// ]]></script>
	<span id="sea_temperature" style="display: none;"><a href="http://www.sea-temperature.com/">Sea temperature</a></span>
	<script src="http://www.sea-temperature.com/id/<?php echo $sc_surf_temperature_id; ?>" type="text/javascript"></script>

	<div id="swell-data">
		<div class='msw-widget'>
			<table>
				<tr>
					<td>
						<span>Water Temperature: </span>
					</td>
					<td>
						<span id="water-temp">00 &#176; F</span>
					</td>
				</tr>
				<tr>
					<td>
						<span>Swell Conditions: </span>
					</td>
					<td>
						<span id="water-info">0.0 ft X 00s</span>
					</td>
				</tr>
				<tr>
					<td>
						<span>Wind Speed/Direction: </span>
					</td>
					<td>
						<span id="wind-info">XX at 0mph</span>
					</td>
				</tr>
				<tr>
					<td>
						<a target="_blank" href="http://magicseaweed.com"><img src="http://im-1-uk.msw.ms/msw_powered_by.png"></a>
					</td>
					<td>
					</td>
				</tr>
			</table>
			
		</div>
	</div><?php

		// Save it to a variable
		$html = ob_get_clean();


		return $html;
	}

}