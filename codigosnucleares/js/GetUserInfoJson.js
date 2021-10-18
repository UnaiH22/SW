$(document).ready(function()
{
    $('#autocompletarJson').click(function()
    {
        $.getJSON("../json/Users.json", function(data)
        {
            var found = false;
            for (u in data.usuarios)
            {
                if (!(data.usuarios[u].email === $('#correoJson').val()))
                    continue;
                else
                {
                    $('#nombreJson').val(data.usuarios[u].nombre);
                    $('#apellido1Json').val(data.usuarios[u].apellido1);
                    $('#apellido2Json').val(data.usuarios[u].apellido2);
                    $('#tfnoJson').val(data.usuarios[u].telefono);
                    found = !found;
                }
            }
            if (!found)
            {
                alert("Usuario no encontrado.");
                $('#nombreJson').val("");
                $('#apellido1Json').val("");
                $('#apellido2Json').val("");
                $('#tfnoJson').val("");
            }
        })
    });
});