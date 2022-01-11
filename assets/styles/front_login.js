$(document).ready(function () {
    $('.button-left').click(function () {
        $('.sidebar').toggleClass('fliph');
    });

});


// fenêtre d' alertes Bootstrap 2claté, ne marche pas sur twig, du coup si tu viens par le voir, essaye à ton tour :). 

let input = document.querySelector(".alert")

setTimeout (function ()  { 
    $( " .alert " ) . fadeTo (500 , 0).slideUp (500, function () { 
        $this.remove () ; 
    }); 
},  4000 ) ;


