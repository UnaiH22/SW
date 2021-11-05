$(document).ready(function()
{
    $.getJSON('http://ip-api.com/json', function(data) 
    {
        let locationData = JSON.parse(JSON.stringify(data));
        $('#location').append("<br><strong> País: " + locationData.country + "<br>" + "Región: " + locationData.regionName + "<br>" + 
        "Ciudad: " + locationData.city + "<br>" + "ISP: " + locationData.as + "<br>" + "IP: " +locationData.query);
    });
});