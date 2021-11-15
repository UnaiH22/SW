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
                    if (datos.startsWith("¡"))
                    {
                        var icon = 'success';
                        var heading = 'Cambio con éxito';
                    }
                    else
                    {
                        var icon = 'error';
                        var heading = 'Error';
                    }
                    $.toast({
                        heading: heading,
                        text: datos,
                        showHideTransition: 'fade',
                        hideAfter: 3000,
                        icon: icon,
                        position: {
                            left: 565,
                            top: 430
                        },
                        loader: false,
                        stack: false
                    })
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
                    if (datos.startsWith("¡"))
                    {
                        var icon = 'success';
                        var heading = 'Eliminado con éxito';
                    }
                    else
                    {
                        var icon = 'error';
                        var heading = 'Error';
                    }
                    $.toast({
                        heading: heading,
                        text: datos,
                        showHideTransition: 'fade',
                        hideAfter: 3000,
                        icon: icon,
                        position: {
                            left: 565,
                            top: 430
                        },
                        loader: false,
                        stack: false
                    })
                }
            });
        }
    });
});