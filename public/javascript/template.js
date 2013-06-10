/* Aici se gasesc functiile ajax pentru butoanele login,register,recovery password */

$(function(){
    /******************Change color********************/
    $("#change-theme img").click(function(){
       var theme_color=$(this).attr("alt");
       setCookie("theme",theme_color,30);
        document.location.reload(true);
    });






    /***********Login form************************/
    $("#login-form").submit(function(e){
        e.preventDefault();
        var $this=$(this);

      //if ok return Boolean true, else return message error
      var response=completeForm($this.get(0));

      if(response.constructor.name!="Boolean"){
         $('#login-messages').html(response);
     }else{
         var send_data=$this.serialize();
         $.ajax({
             type:'POST',
             url:BASE_PATH+LANGUAGE+"/ajax/login",
             data:send_data,
             success:function(response){
                 if(response.trim()=="OK"){
                     location.reload();


                 }else{
                     $('#login-messages').html(response);
                 }
             }
         })
     }

    });
    /***********************************************/

    /***********Register form************************/
    $("#register-form").submit(function(e){
        e.preventDefault();
        var $this=$(this);

        //if ok return Boolean true, else return message error
        var response=completeForm($this.get(0));

        if(response.constructor.name!="Boolean"){
            $('#register-messages').html(response);
        }else{
            var send_data=$this.serialize();
            $.ajax({
                type:'POST',
                url:BASE_PATH+LANGUAGE+"/ajax/register",
                data:send_data,
                success:function(response){
                        $('#register-messages').html(response);
                }
            })
        }

    });
    /***********************************************/

    /*********************Recovery form******************************/
    $("#recovery-form").submit(function(e){
        e.preventDefault();
        var $this=$(this);

        //if ok return Boolean true, else return message error
        var response=completeForm($this.get(0));

        if(response.constructor.name!="Boolean"){
            $('#recovery-messages').html(response);
        }else{
            var send_data=$this.serialize();
            $.ajax({
                type:'POST',
                url:BASE_PATH+LANGUAGE+"/ajax/recover_password",
                data:send_data,
                success:function(response){
                    $('#recovery-messages').html(response);
                }
            })
        }

    });
    /*****************************************************************/


   $('#resetare_parola').click(function(){

        //alert("De trimis formularul");

        var email=$('input#email-recovery').val();
        var dataString='email='+email;
        alert(dataString);
        $.ajax({
            type: "POST",
            url: BASE_PATH+"index/recover_password/",
            data: dataString,
            success: function(response) {
                 // alert(response.trim());
                //if response ok refresh the page

                    //display message back to user here
                    $('#modal-messages').html(response);
                }

        });
        return false;

    });

    /**Fixeaza imaginea de background cu backstretch*********************/
    //$.backstretch(BASE_PATH+"images/road.jpg");
});

/**************Get recovery window************/
function get_recovery(event)
{
    myHelpers.prevDefault(event);
    var positions=myHelpers.getMousePosition(event);
    var posX=positions[0];
    var posY=positions[1];
    var page=document.createElement("div");
    page.id="recoveryDiv";
    page.style.left=posX+"px";
    page.style.top=posY+"px";
    page.style.width="auto";
    page.style.padding="5px";
    page.style.border="5px solid #F6CEEC";
    page.style.borderRadius="10px";
    page.style.height="auto";
    page.style.overflow="auto";
    page.style.backgroundColor="#F8E0F7";
    page.style.position="absolute";

    var form = document.createElement("form");
    form.style.display="inline";
    form.method="post";
    form.action="";
    myHelpers.addEvent(form,"submit",sendEmail);

    var input=document.createElement("input");
    input.type="text";
    input.name="email";
    input.placeholder="EMAIL...";
    form.appendChild(input);

    var sendBtn=document.createElement("button");
    sendBtn.type="submit";
    var btnText=document.createTextNode("Send");
    sendBtn.appendChild(btnText);
    form.appendChild(sendBtn);

    var resetBtn=document.createElement("button");
    resetBtn.type="reset";
    resetBtn.onclick=function(evt){
        var thisDiv=document.getElementById("recoveryDiv");
        thisDiv.parentNode.removeChild(thisDiv);
    }
    var btnText1=document.createTextNode("Close");
    resetBtn.appendChild(btnText1);
    form.appendChild(resetBtn);


    page.appendChild(form);
    document.body.appendChild(page);


}
/****************Send email recovery***************************************************************************/
function sendEmail(event){
    myHelpers.prevDefault(event);
    var email=this.email.value;
    if(validateEmail(email)){
        //sending email by ajax
       // alert("email OK");
        var parentId=this.parentNode.getAttribute("id");
        var pageDiv=this.parentNode;
        myHelpers.processAjax(parentId,"POST",BASE_PATH+LANGUAGE+"/ajax/recovery_password","email="+email);
        setTimeout(function(){pageDiv.parentNode.removeChild(pageDiv)},10000);
    }else{
        alert("Incoreect Email");
    }
}


/****************************************************************************************************************/

function searchNews($this,event){

    // evt.preventDefault();

    if(event.keyCode==13){
        $.ajax({
            url:BASE_PATH+LANGUAGE+"/ajax/search_news",
            type:'POST',
            data:"search_txt="+encodeURIComponent($this.value),
            success:function(responseText){
                $("#contents-body").html(responseText);
            }
        });
    }
}

function completeForm(formObj){

    var errors=new Array();

    for(var i=0;i<formObj.elements.length;i++){

        if(formObj.elements[i].name=="email"){
          if(!validateEmail(formObj.elements[i].value))
           errors.push("- Invalid email");
        }else{
            if(formObj.elements[i].value.length<3 && formObj.elements[i].type!="checkbox" && formObj.elements[i].type!="submit" &&  formObj.elements[i].type!="radio" ){
                var elementName=formObj.elements[i].name;
                if(elementName.indexOf("_")>0)
                    elementName=elementName.replace("_","-");

                errors.push("- Invalid "+elementName);
            }

        }
    }
    if (errors.length>0){
        return errors.join("<br/>");
    }else{
        return true;
    }

}

function validateEmail(email)
{
    var emailPattern=new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$");
    return email.match(emailPattern);
}

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=encodeURIComponent(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
   //first unset cookie
    //document.cookie=c_name + "=" + c_value+'; expires=Thu, 01 Jan 1970 00:00:01 GMT';
    document.cookie=c_name + "=" + c_value;

}
function getCookie(c_name)
{
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1)
    {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1)
    {
        c_value = null;
    }
    else
    {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1)
        {
            c_end = c_value.length;
        }
        c_value = decodeURIComponent(c_value.substring(c_start,c_end));
    }
    return c_value;
}