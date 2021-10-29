$(document).ready(function()
{
    $("#enviar").click(function()
    {
        let myForm = document.getElementById('formPreguntas');
        let formData = new FormData(myForm);
        
        $.ajax({
        url: '../php/AddQuestionWithImage.php',
        type: 'POST',
        data: formData,
        dataType: "html",
        contentType: false,
        processData: false,
        success:function(datos)
        {
            $('#preguntasFeedback').fadeIn().html(datos);
        },
        cache : false,
        error:function()
        {
            $('#preguntasFeedback').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
        }});
    });
});