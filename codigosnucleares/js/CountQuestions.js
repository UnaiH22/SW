$(document).ready(function()
{
    function contarPreguntas()
    {
    $.ajax(
    {
        type: 'GET',
        url: '../json/Questions.json',
        contentType: "application/json",
        dataType: 'json',
        data: {},
        cache: false,
        success: function(data)
        {
            var misPreguntas = 0;
            var miEmail = $('#email').val();
            var preguntasTotales = 0;
            $.each(data.assessmentItems, function(i, v)
            {
                if (v.author == miEmail)
                    ++misPreguntas;
                ++preguntasTotales;
            });

            $('#misPreguntas').empty();
            $('#misPreguntas').html('Mis Preguntas').append("<br/>" + misPreguntas + ' / ' + preguntasTotales);
        }
    });
}
contarPreguntas();
setInterval(function(){contarPreguntas()}, 3000);
});