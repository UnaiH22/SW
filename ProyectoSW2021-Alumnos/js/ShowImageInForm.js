function readURL(event)
{
	var image = document.getElementById("output");
	image.src = URL.createObjectURL(event.target.files[0]);
};