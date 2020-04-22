/* Shift the Sidenav + Content 250px to the right, Make dark overlay filter visible*/
function openNav() {
  document.getElementById("sidenav-main").style.transform = "translateX(0px)";
  document.getElementById("content-wrapper").style.transform = "translateX(+250px)";
  $('head').append('<style>#content-wrapper::before{opacity: 1; visibility:visible;;}</style>');
   setTimeout(function(){
    $('#content-wrapper').attr('onclick', 'closeNav()');
}, 600);
}

/* Shift the Sidenav + Content 250px to the left, Make dark overlay filter invisible*/
function closeNav() {
  document.getElementById("sidenav-main").style.transform = "translateX(-250px)";
  document.getElementById("content-wrapper").style.transform = "translateX(0px)";
  $('head').append('<style>#content-wrapper::before{opacity: 0; visibility:hidden;;}</style>');
  $('#content-wrapper').attr('onclick', '');
}

function filter() {
    // Declare variables 
var $rows = $('#table tbody tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});};

//Table Row -> HREF
jQuery(document).ready(function ($) {
    $(".tablebtn").on('click', function () {
        window.location = $(this).data("href");
    })});