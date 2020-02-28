function delay(URL) {
    $("body").removeClass("fade");
    $("body").addClass("fade");
    setTimeout(function () {
        window.location = URL;
    }, 250)
};

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("sidenav-main").style.width = "250px";
  document.getElementById("content").style.marginLeft= "250px";
  document.getElementById("header").style.marginLeft = "250px";
  $('head').append('<style>.page-wrapper:before{opacity: 1; visibility:visible;;}</style>');
}

function closeNav() {
  document.getElementById("sidenav-main").style.width = "0";
  document.getElementById("content").style.marginLeft= "0";
  document.getElementById("header").style.marginLeft = "0px";
  $('head').append('<style>.page-wrapper:before{opacity: 0; visibility:hidden;;}</style>');
}

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
