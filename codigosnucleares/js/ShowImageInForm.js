function readURL(event)
{
	var image = document.getElementById("output");
	$("#output").show();
	image.src = URL.createObjectURL(event.target.files[0]);
};