$(document).ready(function()
{
    function contarUsuarios()
    {
    $.ajax(
    {
        type: 'GET',
        url: '../xml/UserCounter.xml',
        dataType: 'xml',
        cache: false,
        success: function(xml)
        {
            var totalUsers = 0;
            $(xml).find("user").each(function()
            {
                ++totalUsers;
            });
            $('#totalUsuarios').html('Usuarios Online').append("<br/>" + totalUsers);
        }
    });
}
contarUsuarios();
setInterval(function(){contarUsuarios()}, 3000);
});