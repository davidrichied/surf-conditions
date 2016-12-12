=== Surf Conditions ===
Contributors: davidrichied
Donate link: http://example.com/
Tags: surf, sea, ocean, conditions, waves, water temperature
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 4.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This is a WordPress plugin that uses the Magic Sea Weed API to get information about sea conditions.

== Description ==

https://www.youtube.com/watch?v=G8Uoj73mKCA

<p>This is a WordPress plugin that uses the Magic Sea Weed API to get information about sea conditions. Please note that you must obtain an API key from magicseaweed.com before using this plugin.</p>

== Installation ==

https://www.youtube.com/watch?v=G8Uoj73mKCA

<ul>
	<li>Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.</li>
	<li>Activate the plugin through the 'Plugins' screen in WordPress</li>
	<li>Use the Settings->Surf Conditions screen to add your Magic Sea Weed API Key, a location ID from magicseaweed.com, and another location ID from sea-temperature.com.
		<ul>
			<li>Get the API key from magicseaweed.com: http://magicseaweed.com/developer/sign-up. They are currently in beta so you will have to email them for an API.</li>
			<li>To get the location ID, visit a location on magicseaweed.com and copy the numbers at the end of the URL. In the following URL, the location ID is 297: http://magicseaweed.com/Mission-Beach-San-Diego-Surf-Report/297/</li>
			<li>To get the Sea Temperature ID, visit a location on sea-temperature.com and copy the ID at the end of the URL. Example: In the following URL, the ID is 1115: http://sea-temperature.com/water/money%20point,%20va%20/1115</li>
		</ul>
	</li>
	<li>Use the shortcode [surf_conditions] to display the widget</li>
</ul> 


== Frequently Asked Questions ==

= What can this plugin do? =

The functionality of this plugin is pretty basic. It grabs the following data from the Magic Sea Weed API and displays it in a tabular format:
Water Temperature: X F
Swell Conditions: combined swell height, combined swell compass direction, combined swell period
Wind Speed/Direction: wind direction at Xmph

== Screenshots ==

1. This is what the widget will look like.

== Changelog ==

= 1.0 =
*

== Upgrade Notice ==

== Arbitrary section ==

== A brief Markdown Example ==