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
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");


    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
};
jQuery(document).ready(function ($) {
    $(".tablebtn").on('click', function () {
        window.location = $(this).data("href");
    })});