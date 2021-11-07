$(document).ready(function()
{
    let ip = '0';
    $.getJSON("https://api.ipify.org/?format=json", function(e) 
    {
        ip = e.ip;
        var link = 'https://ipapi.co/' + ip + '/json/';
        $.getJSON(link, function(data)
        {
            let locationData = JSON.parse(JSON.stringify(data));
            $('#location').append("<br><strong> País: " + locationData.country_name + "<br>" + "Región: " + locationData.region + "<br>" + 
            "Ciudad: " + locationData.city + "<br>" + "ISP: " + locationData.org + "<br>" + "IP: " + locationData.ip + "<br>" + "LAT/LON: (" + 
            locationData.latitude + ", " + locationData.longitude + ")");

            const localizacion = { lat: locationData.latitude, lng: locationData.longitude };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: localizacion,
            });

            const marker = new google.maps.Marker({
                position: localizacion,
                map: map,
            });
        })
    })
});