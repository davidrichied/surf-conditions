<?php
class surf_Conditions_MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Surf Conditions', 
            'manage_options', 
            'surf-conditions-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'sc_options' );
        ?>
        <div class="wrap">
            <h1>Surf Conditions Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'sc_options_group' );
                do_settings_sections( 'surf-conditions-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'sc_options_group', // Option group
            'sc_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'General Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'surf-conditions-setting-admin' // Page
        );  

        add_settings_field(
            'sc_api_key', // ID
            'Magic Surf Weed API Key', // Title 
            array( $this, 'sc_api_key_callback' ), // Callback
            'surf-conditions-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'sc_location_id', 
            'Location ID', 
            array( $this, 'sc_location_id_callback' ), 
            'surf-conditions-setting-admin', 
            'setting_section_id'
        );

        add_settings_field(
            'sc_surf_temperature_id', 
            'Sea Temperature Location ID', 
            array( $this, 'sc_surf_temperature_id_callback' ), 
            'surf-conditions-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['sc_api_key'] ) )
            $new_input['sc_api_key'] = $input['sc_api_key'];

        if( isset( $input['sc_location_id'] ) )
            $new_input['sc_location_id'] = sanitize_text_field( $input['sc_location_id'] );

        if( isset( $input['sc_surf_temperature_id'] ) )
            $new_input['sc_surf_temperature_id'] = sanitize_text_field( $input['sc_surf_temperature_id'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function sc_api_key_callback()
    {
        printf(
            '<p>Get the API key from <a href="http://magicseaweed.com/developer/sign-up" target="_blank">magicseaweed.com</a>. They are currently in beta so you will have to email them for an API.</p>
            <input type="text" id="sc_api_key" name="sc_options[sc_api_key]" value="%s" />',
            isset( $this->options['sc_api_key'] ) ? esc_attr( $this->options['sc_api_key']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function sc_location_id_callback()
    {
        printf(
            '<p>To get the location ID, visit <a target="_blank" href="http://magicseaweed.com/Mission-Beach-San-Diego-Surf-Report/297/">a location</a> and copy the numbers at the end of the URL.</p>
            <p>In the following URL, the location ID is 297: http://magicseaweed.com/Mission-Beach-San-Diego-Surf-Report/297/</p>
            <input type="text" id="sc_location_id" name="sc_options[sc_location_id]" value="%s" />',
            isset( $this->options['sc_location_id'] ) ? esc_attr( $this->options['sc_location_id']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function sc_surf_temperature_id_callback()
    {
        printf(
            '<p>To get the Surf Temperature ID, visit <a target="_blank" href="http://sea-temperature.com/water/money%%20point,%%20va%%20/1115">a location</a> on <a href="surf-temperature.com" target="_blank">http://sea-temperature.com</a> and copy the ID at the end of the URL.</p>
            <p>Example: In the following URL, the ID is 1115: http://sea-temperature.com/water/money%%20point,%%20va%%20/1115</p>
            <input type="text" id="sc_surf_temperature_id" name="sc_options[sc_surf_temperature_id]" value="%s" />',
            isset( $this->options['sc_surf_temperature_id'] ) ? esc_attr( $this->options['sc_surf_temperature_id']) : ''
        );
    }
}