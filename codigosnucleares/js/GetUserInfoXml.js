$(document).ready(function()
{
    $('#autocompletar').click(function()
    {
        $.get('../xml/Users.xml', function(d)
        {
            var emailus = $('#correo').val();
            var nombre = null;
            $(d).find('usuario').each(function()
            {
                var $usuario = $(this);
                var email = $usuario.find('email').text();

                if(email === emailus)
                {
                    nombre = $usuario.find('nombre').text();
                    var apellido1 = $usuario.find('apellido1').text();
                    var apellido2 = $usuario.find('apellido2').text();
                    var telefono = $usuario.find('telefono').text();

                    $('#nombre').val(nombre);
                    $('#apellido1').val(apellido1);
                    $('#apellido2').val(apellido2);
                    $('#tfno').val(telefono);
                }
            });
            if(nombre === null)
            {
                alert("Usuario no encontrado.");
                $('#nombre').val("");
                $('#apellido1').val("");
                $('#apellido2').val("");
                $('#tfno').val("");
            }
        });
    });
});