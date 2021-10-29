function isEmpty( elem )
{
    return !$.trim(elem.html())
}

function verPreguntas()
{
    if (isEmpty($('#resultado')))
    {
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("resultado").innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open("GET", "../php/ShowJsonQuestions.php", true);
        xmlhttp.send();
    }
    else
        $("#resultado").empty();
}

