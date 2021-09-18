function verificar()
{
    var email = document.getElementById("email").value;
    var pregunta = document.getElementById("pregunta").value;
    var respuestaCorrecta = document.getElementById("respuestaCorrecta").value;
    var respuestaInc1 = document.getElementById("respuestaIncorrecta1").value;
    var respuestaInc2 = document.getElementById("respuestaIncorrecta2").value;
    var respuestaInc3 = document.getElementById("respuestaIncorrecta3").value;
    var dificultad = document.getElementById("dificultad").value;
    var tema = document.getElementById("tema").value;

    var regExEmailStud = /[a-z]+\d{3}\@ikasle\.ehu\.(eus|es)/;
    var regExEmailProf = /([a-z]+|[a-z]+\.[a-z]+)\@ehu\.(eus|es)/;

    if (email.length < 1 || pregunta.length < 1 || respuestaCorrecta.length < 1 || respuestaInc1.length < 1 || respuestaInc2.length < 1 || respuestaInc3.length < 1 || tema.length < 1)
    {
        alert("Error. Rellena los campos obligatorios.");
        return false;
    }

    if (pregunta.length < 10)
    {
        alert("La pregunta debe de tener al menos 10 caracteres.");
        return false;
    }

    if (!regExEmailStud.exec(email) || !regExEmailProf.exec(email))
    {
        alert("Email no válido.");
        return false;
    }
    return true;
}