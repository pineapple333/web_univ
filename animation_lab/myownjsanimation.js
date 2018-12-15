window.onload = function{
	var canvas = document.getElementsById("canvas");
	var context = convas.getContext("canvas");
	context.moveTo(10,101);
	context.lineTo(20,20);
	context.stroke();
	context.arc(50,50,80,0,Math.PI,false);
	context.stroke();
	context.rect(0,0,100,200);
	context.strokeStyle = 5;
    //стиль заполнения
    context.fillStyle = "red";
    context.fill();
    context.reload();
}