jQuery(document).ready(function($) {
    jQuery.ajax({
      type:'POST',
      url: sc_ajax.ajaxurl,
      data:{
      //Call sc_get_api_data() to retrieve the data from the MSW API
      action:'sc_get_api_data',
      },
      datatype: 'json',        
      success: function(data) {
        console.log(data)
        //Get the water temperature (not from the API) from the invisible widget to display later
        var waterTemp = jQuery(".sea_temperature2").text();
        var waterTempNumber = parseInt(waterTemp);
        //Parse the JSON data from the Ajax call into an object
        var surfData = JSON.parse(data);
        var surfData = JSON.parse(surfData);
        //Get the first object containing swell data
        var swellData = surfData[0].swell;
        var combinedSwell = swellData.components.combined;
        var wind = surfData[0].wind;
        var wave_direction = combinedSwell.compassDirection + " " + combinedSwell.period;
        var water_info = combinedSwell.height + " ft " + combinedSwell.compassDirection + " " + combinedSwell.period + "s";
        var wind_info = wind.compassDirection + " at " + wind.speed + wind.unit;
        var water_temp = waterTempNumber + " &#176; F";

        
        //Append the text to the elements
        jQuery('#water-temp').html(water_temp);
        jQuery('#water-info').html(water_info);
        jQuery('#wind-info').html(wind_info);
      }
    });    


})