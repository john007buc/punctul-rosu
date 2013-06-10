$(document).ready(function(){
   /* var docHeight = $(document).height();
    var viewHeight = $(window).height();

    if (docHeight >= viewHeight) {
        $('#myshell').css({
            "min-height":docHeight-50,
            "height":"auto"
        });
    } else {

        $('#myshell').css({
            "min-height":viewHeight,
            "height":"auto"

        });

    };*/
    var viewHeight = $(window).height();
    $('.shell').css({
        "min-height":viewHeight-100,
        "height":"auto"
    });
});