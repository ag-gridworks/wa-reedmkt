function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function ptcolor(name,color) {
  var a = document.getElementById(name);
  a.style.backgroundColor = color;
}

jQuery(document).ready(function($) {  
$(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
});

});