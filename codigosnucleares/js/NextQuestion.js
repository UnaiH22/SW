
$("#next").click(function()
{        
    $.ajax({
    url: '../php/NextQuestion.php',
    type: 'GET',
    dataType: "json",
    success:function(datos)
    {
        $("#pregunta").val(datos.Pregunta);
        $("#image").attr("src",datos.img);
        $("#ans1").val(datos.r2);
        $("#ans2").val(datos.r2);
        $("#ans3").val(datos.r3);
        $("#ans4").val(datos.r4);
    }
    });
});
