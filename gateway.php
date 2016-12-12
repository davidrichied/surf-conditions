<?php
foreach (glob(dirname(__FILE__) . '/lib/classes/*.php') as $classfilename) {
    include_once $classfilename;
}

$Surf_Conditions = new Surf_Conditions();

class Surf_Conditions {
    private static $cache = array();

    private static $pluginBasename;

    private static $pluginUrl;

    public function __construct()
    {
        self::$pluginBasename = dirname( plugin_basename( __FILE__ ) );
        self::$pluginUrl = plugin_dir_url(__FILE__);
    }


    public static function manageScripts()
    {
        if (!isset(self::$cache['manageScripts'])) {
            self::$cache['manageScripts'] = new Surf_Conditions_ManageScripts(self::$pluginUrl);
        }
        return self::$cache['manageScripts'];
    }

    public static function ajaxFunctions()
    {
        if (!isset(self::$cache['ajaxFunctions'])) {
            self::$cache['ajaxFunctions'] = new Surf_Conditions_AjaxFunctions();
        }
        return self::$cache['ajaxFunctions'];
    }


    public static function addShortcode()
    {
        if (!isset(self::$cache['addShortcode'])) {
            self::$cache['addShortcode'] = new Surf_Conditions_AddShortcode(self::$pluginUrl);
        }
        return self::$cache['addShortcode'];
    }


    public static function mySettingsPage()
    {
        if (!isset(self::$cache['mySettingsPage'])) {
            self::$cache['mySettingsPage'] = new Surf_Conditions_MySettingsPage();
        }
        return self::$cache['mySettingsPage'];
    }

}