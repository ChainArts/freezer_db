function delay(URL) {
    $("body").removeClass("fade");
    $("body").addClass("fade");
    setTimeout(function () {
        window.location = URL;
    }, 250)
};

$(document).ready(function () {
    // Retrieve container position relative to viewport
var rect = $('#container')[0].getBoundingClientRect();
// Create mouse object to keep track of mouse coordinates
var mouse = {x: 0, y: 0, moved: false};

$("#container").mousemove(function(e) {
  // set moved property to true
  mouse.moved = true;
  // calculate mouse coordinates
  mouse.x = e.clientX - rect.left;
  mouse.y = e.clientY - rect.top;
});
 
// Ticker event will be called on every frame
TweenLite.ticker.addEventListener('tick', function(){
  // if mouse is moved call parallax function
  if (mouse.moved){    
    parallaxIt(".wrapper", -30);
    parallaxIt(".login", -10);
    parallaxIt(".content-wrapper", -50)
    parallaxIt(".menu", -5)
    parallaxIt(".menulist", -10)
  }
  // set moved property to false on each frame so parallax function won't be called more than once
  mouse.moved = false;
});

// Simplest part, take mouse coordinates and container dimensions and animate elements
function parallaxIt(target, movement) {
  TweenMax.to(target, 0.3, {
    x: (mouse.x - rect.width / 2) / rect.width * movement,
    y: (mouse.y - rect.height / 2) / rect.height * movement
  });
}

// Recaclulate container dimensions on resize and scroll
$(window).on('resize scroll', function(){
  rect = $('#container')[0].getBoundingClientRect();
})
});
