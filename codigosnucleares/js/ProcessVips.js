$(document).ready(function()
{
    $("#verSiEsVip").click(function()
    {
        
        if ($.trim($('#vips').val()) == "")
        {
            $('#procesarVip').empty();
            $('#procesarVip').append("Introduce un email.");
            return false;
        }

        let myForm = document.getElementById('verVips');
        let formData = new FormData(myForm);

        $.ajax({
        url: '../php/IsVipAjax.php',
        type: 'POST',
        data: formData,
        dataType: "html",
        contentType: false,
        processData: false,
        success:function(datos)
        {
            $('#procesarVip').fadeIn().html(datos);
        },
        cache : false,
        error:function()
        {
            $('#procesarVip').fadeIn().html('<p class="error"><strong>Error.</p>');
        }});
    });

    $("#añadirVIP").click(function()
    {
        if ($.trim($('#vips').val()) == "")
        {
            $('#procesarVip').empty();
            $('#procesarVip').append("Introduce un email.");
            return false;
        }

        let myForm = document.getElementById('verVips');
        let formData = new FormData(myForm);

        $.ajax({
            url: '../php/AddVipAjax.php',
            type: 'POST',
            data: formData,
            dataType: "html",
            contentType: false,
            processData: false,
            success:function(datos)
            {
                $('#procesarVip').fadeIn().html(datos);
            },
            cache : false,
            error:function()
            {
                $('#procesarVip').fadeIn().html('<p class="error"><strong>Error.</p>');
            }
        });
    });

    $("#listaVIPs").click(function()
    { 
        $.ajax({
            url: '../php/ShowVipsAjax.php',
            type: 'GET',
            dataType: "html",
            success:function(datos)
            {
                $('#procesarVip').fadeIn().html(datos);
            },
            cache : false,
            error:function()
            {
                $('#procesarVip').fadeIn().html('<p class="error"><strong>Error.</p>');
            }
        });
    });

    $("#borraVIP").click(function()
    {
        
        if ($.trim($('#vips').val()) == "")
        {
            $('#procesarVip').empty();
            $('#procesarVip').append("Introduce un email.");
            return false;
        }

        let myForm = document.getElementById('verVips');
        let formData = new FormData(myForm);

        $.ajax({
            url: '../php/DeleteVipAjax.php',
            type: 'POST',
            data: formData,
            dataType: "html",
            contentType: false,
            processData: false,
            success:function(datos)
            {
                $('#procesarVip').fadeIn().html(datos);
            },
            cache : false,
            error:function()
            {
                $('#procesarVip').fadeIn().html('<p class="error"><strong>Error.</p>');
            }
        });
    });
});