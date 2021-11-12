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
        
    });

    $("#delete").click(function()
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
    });
});