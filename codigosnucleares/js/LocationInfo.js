$(document).ready(function () 
{
    async function detectAdBlock() 
    {
        let adBlockEnabled = false
        const googleAdUrl = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
        try 
        {
            await fetch(new Request(googleAdUrl)).catch(_ => adBlockEnabled = true)
        }
        catch (e) 
        {
            adBlockEnabled = true; 
        } 
        finally 
        {
            console.log(`AdBlock Enabled: ${adBlockEnabled}`);
            if (!adBlockEnabled)
            {
                fetch('https://ipinfo.io/json?token=989cef4859ec54').then(response => response.json()).then(data => 
                {
                    $('#location').append("<br><strong> País: " + data.country + "<br>" + "Región: " + data.region + "<br>" +
                        "Ciudad: " + data.city + "<br>" + "ISP: " + data.org + "<br>" + "IP: " + data.ip + "<br>" + "LAT/LON: (" +
                        data.loc + ")");

                    var coords = data.loc.split(",");
                    const localizacion = { lat: parseInt(coords[0]), lng: parseInt(coords[1])  };
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 7,
                        center: localizacion,
                    });

                    const marker = new google.maps.Marker({
                        position: localizacion,
                        map: map,
                    });
                });
            }
            else{
                $('#location').append("<br><font color='red'>Error. Por favor desactiva el adblock para mostrar la localización.</font>");
            }
        }
    }
    detectAdBlock()
});
