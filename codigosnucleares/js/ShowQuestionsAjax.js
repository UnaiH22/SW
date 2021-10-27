function isEmpty( el )
{
    return !$.trim(el.html())
}

$(document).ready(function()
{
    $("#ver").click(function()
    {
        if (isEmpty($('#resultado')))
        {
            var tbl = $('<table>');
            tbl.append('<thead>').children('thead').append('<tr/>').children('tr').append('<th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th>');
            var tbody = tbl.append('<tbody/>').children('tbody');

            $.getJSON("../json/Questions.json").done(function(data)
            {
                $.each(data.assessmentItems, function(i, item)
                {
                    tbody.append('<tr/>').children('tr:last').append("<td>"+item.author+"</td>").append("<td>"+item.itemBody.p+"</td>").append("<td>"+item.correctResponse.value+"</td>");
                });
                tbl.appendTo('#resultado');
            });
        }
        else
        {
            $("#resultado").empty();
        }
    });
});

