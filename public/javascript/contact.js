$(document).ready(function(){

    /************************Refresh captcha image***************************************/
    $('#refreshCaptcha').click(function(evt){
        evt.preventDefault();
        var d = new Date();
        var t = d.getTime();
        //$(this).prev("img").attr("src","");
        $(this).prev("img").attr("src",BASE_PATH+LANGUAGE+"/captcha/index/"+t);

    });

    /*****************Afiseaza imaginea ajax load**********************************************/
   /* $("#submit-btn").click(function(evt){
        if(!$("#load-gif-div #load-img").get(0)){
            $("#load-gif-div").append("<img class='pull-right' id='load-img' src='"+BASE_PATH+"images/ajax-loader.gif' width='40px' height='40px'>");
        }
        $("#load-img").fadeOut(4000);
    });*/
});
