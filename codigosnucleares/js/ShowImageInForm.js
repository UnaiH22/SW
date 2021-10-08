function readURL(event)
{
    $('#image').remove();
    var img = $('<img id="image">');    
    img.attr('src', URL.createObjectURL(event.target.files[0]));
    img.attr('height',105);
    $(img).insertAfter('#marco');
};