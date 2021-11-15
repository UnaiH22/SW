$(document).ready(function()
{
    function refresh()
    {
        $.ajax
        ({
            url: '../php/RefreshUsers.php',
            type: 'GET',
            dataType: "html",
            success:function(datos)
            {
                $('#usrs').fadeIn().html(datos);
            },
            cache : false,
        });
    }
    refresh();
    setInterval(function(){refresh()}, 3000);

    $("#ban").click(function()
    {
        if (confirm('¿Seguro que quieres banear a ' + $('#usuario_modificado').val() + '?')) 
        {
            $.ajax
            ({
                url: '../php/ChangeUserState.php?usr=' + $('#usuario_modificado').val(),
                type: 'POST',
                dataType: "html",
                cache : false,
                success:function(datos)
                {
                    $('#res').fadeIn().html(datos);
                }
            });
        }
        
    });

    $("#delete").click(function()
    {
        if (confirm('¿Seguro que quieres eliminar a ' + $('#usuario_modificado').val() + '?')) 
        {
            $.ajax
            ({
                url: '../php/RemoveUser.php?usr=' + $('#usuario_modificado').val(),
                type: 'POST',
                dataType: "html",
                cache : false,
                success:function(datos)
                {
                    $('#res').fadeIn().html(datos);
                }
            });
        }
    });
});