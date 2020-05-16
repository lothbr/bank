var slide = document.querySelectorAll(".slider .slide");
var currentSlide = 0;
var interval = setInterval(nextSlide, 4000);
function nextSlide() {
	slide[currentSlide].setAttribute('class', 'slide');
	currentSlide = (currentSlide + 1) % slide.length;
	slide[currentSlide].setAttribute('class', 'slide active');
}

var btn = document.getElementById('btn');

btn.onclick = function() {
	location.href = "index.html";
}


var id = document.getElementById('id');

id.onclick = function() {
	location.href = "account.html";
}

var forget = document.getElementById('forget');

forget.onclick = function() {
	location.href = "forget.html";
}




// function bar() {
// 	//document.getElementById("top-bar").style.width = "250px";
// 	document.getElementById("main").style.marginLeft = "-250px";
// }

