function InsertarPregunta()
{
    var output = document.getElementById("preguntasFeedback");
    var formElement = new FormData(document.getElementById("formPreguntas"));

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() 
    {
        if (this.readyState==4 && this.status==200)
        {
            output.innerHTML += "Pregunta insertada correctamente!<br />" + this.responseText;
        }
        else
            output.innerHTML += "Error " + xmlhttp.status + ".<br />";
    }
    xmlhttp.open("POST", "../php/AddQuestionWithImage.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(formElement);
}