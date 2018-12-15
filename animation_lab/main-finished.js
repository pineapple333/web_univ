
var script = document.createElement('script');
script.src = "jquery-1.8.1.js";
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

// setup canvas
var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');

var width = canvas.width = 800;
var height = canvas.height = 500;

// function to generate random number

function random(min,max) {
  var num = Math.floor(Math.random()*(max-min)) + min;
  return num;
}

// define Ball constructor

function Ball(x, y, velX, velY, color, size) {
  this.x = x;
  this.y = y;
  this.velX = velX;
  this.velY = velY;
  this.color = color;
  this.size = size;
}

// define ball draw method

Ball.prototype.draw = function() {
  ctx.beginPath();
  ctx.fillStyle = this.color;
  ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI);
  ctx.fill();
};

// define ball update method

Ball.prototype.update = function() {
	
  if((this.x + this.size) >= width) {
    this.velX = -(this.velX);
  }

  if((this.x - this.size) <= 0) {
    this.velX = -(this.velX);
  }

  if((this.y + this.size) >= height) {
    this.velY = -(this.velY);
  }

  if((this.y - this.size) <= 0) {
    this.velY = -(this.velY);
  }

  this.x += this.velX;
  this.y += this.velY;
};

// define ball collision detection

Ball.prototype.collisionDetect = function() {
  for(var j = 0; j < balls.length; j++) {
    if(!(this === balls[j])) {
      var dx = this.x - balls[j].x;
      var dy = this.y - balls[j].y;
      var distance = Math.sqrt(dx * dx + dy * dy);

      if (distance < this.size + balls[j].size) {
        balls[j].color = this.color = 'rgb(' + random(0,255) + ',' + random(0,255) + ',' + random(0,255) +')';
      }
    }
  }
};

// define array to store balls

var balls = [];

// define loop that keeps drawing the scene constantly

function loop() {
  ctx.fillStyle = 'rgba(0,0,0,0.25)';
  ctx.fillRect(0,0,width,height);

  while(balls.length < 5) {
    var size = random(10,20);
    var ball = new Ball(
      // ball position always drawn at least one ball width
      // away from the adge of the canvas, to avoid drawing errors
      random(0 + size,width - size),
      random(0 + size,height - size),
      random(-7,7),
      random(-7,7),
      'rgb(' + random(0,255) + ',' + random(0,255) + ',' + random(0,255) +')',
      size
    );
    balls.push(ball);
  }

  for(var i = 0; i < balls.length; i++) {
    balls[i].draw();
    balls[i].update();
    balls[i].collisionDetect();
  }

  requestAnimationFrame(loop);
}

function stop(){
	
	for(var i = 0; i < balls.length; i++) {
		balls[i].velX = 0;
		balls[i].velY = 0;
		balls[i].update();
	}
	console.log(balls);
}

function increase(){
	
	var coef = $("#points").val();
	
	//console.log("Coeficient : " + coef);
	
	/*console.log("Before");
	
	for(var i = 0; i < balls.length; i++) {
		console.log(i + " velX " + balls[i].velX);
		console.log(i + " velY " + balls[i].velY);
	} */
	
	for(var i = 0; i < balls.length; i++) {
		balls[i].velX = balls[i].velX + parseInt(coef);
		balls[i].velY = balls[i].velY + parseInt(coef);
		balls[i].update();
	}
	
	/*console.log("After");
	
	for(var i = 0; i < balls.length; i++) {
		console.log(i + " velX " + balls[i].velX);
		console.log(i + " velY " + balls[i].velY);
	} 
	console.log(balls);*/
}

function decrease(){
	
	var coef = $("#points").val();
	
	for(var i = 0; i < balls.length; i++) {
		balls[i].velX = balls[i].velX - parseInt(coef);
		balls[i].velY = balls[i].velY - parseInt(coef);
		balls[i].update();
	}
	console.log(balls);
}

loop();