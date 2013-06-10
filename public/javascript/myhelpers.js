/******* Obiectul myUtility pentru rezolvarea problemelor cross-browser***************/

var myHelpers={

    getMousePosition:function(evt){
        var event=evt || window.event;
        if(event.pageX)
        {
            posX=event.pageX;
            posY=event.pageY;

        }
        else if(event.clientX)
        {
            //valabil in IE
            posX=event.clientX+document.body.scrollLeft;
            posy=event.clientY+document.body.scrollTop;

        }

        return [posX,posY];
    },

    prevDefault:function(evt)
    {
        var event=evt || window.event;

        if(typeof event.preventDefault !="undefined")
            event.preventDefault();
        else if(typeof event.returnValue !="undefined")
            event.returnValue=false;

    },

    getTarget:function(evt)
    {
        var event=evt||window.event;
        if(typeof event.target!=="undefined"){
            return event.target;
        }else{
            return event.srcElement;
        }

    },
    addEvent:function(element,type,func){

        if(typeof addEventListener !=="undefined"){
            //bubbling event handler
            element.addEventListener(type,func,false);
        } else if(typeof attachEvent !== "undefined"){
            element.attachEvent("on"+type,func);
        }else{
            element["on"+type]=func;
        }

    },
    formSerialize:function(formObj){
        var valuesArray=new Array();

        for(var i=0;i<formObj.elements.length;i++)
        {
            if(formObj.elements[i].name!="")
            {
                valuesArray.push(formObj.elements[i].name+"="+encodeURIComponent(formObj.elements[i].value));
            }
        }
        return valuesArray.join("&");
    },
    removeEvent:function(element,type,func){
        if(typeof removeEventListener !== "undefined"){
            element.removeEventListener(type,func,false);
        }else if(typeof detachEvent!=="undefined"){
            element.detachEvent("on"+type,func);
        }else{
            element["on"+type]=null;
        }


    },
    getXmlHttp:function(){
        var xmlHttpObject;

        try{

            xmlHttpObject=new XMLHttpRequest();

        }catch(e)
        {
            try
            {
                xmlHttpObject=new ActiveXObject(Msxml2.XMLHTTP);
            }catch(e)
            {
                try{

                    xmlHttpObject=new ActiveXObject(Microsoft.XMLHTTP);
                }catch(e)
                {
                    return false;
                }
            }
        }

        return xmlHttpObject;
    },

    processAjax:function(divId,method,phpPage,params){

      //INITIALIZARE VARIABILE VALABILE PER REQUEST
        var this_obj=this;
        this_obj.processAjaxOK=null;
        this_obj.ajaxMessage=null;


        if(divId){
          var divObj=document.getElementById(divId);
          divObj.style.visibility="visible";
        }
        else{
            var divObj=null;
        }

        var xmlHttpObject=this.getXmlHttp();



        if (xmlHttpObject)
        {

            xmlHttpObject.onreadystatechange=function(){

                if(xmlHttpObject.readyState==4 && xmlHttpObject.status==200)
                {
                    var response=xmlHttpObject.responseText;

                    //DACA RASPUNSUL NU CONTINE ERORI SAU DACA NU EXISTA UN DIV UNDE SA FIE TRIMIS
                    if(response.indexOf("*ERROR*")<0 || !divObj)
                    {
                       //DACA RASPUNSUL ESTE TRIMIS INTR-UN DIV
                       if(divObj){
                        divObj.innerHTML=response;

                        /** EXECUTA TAGURILE SCRIPT **/
                        var scriptElements=divObj.getElementsByTagName("script");

                        for(var i=0;i<scriptElements.length;i++)
                        {
                            if(scriptElements[i].innerHTML!="")
                                eval(scriptElements[i].innerHTML);
                        }

                       }else{
                           this_obj.ajaxMessage=response;
                          // alert(this_obj.ajaxMessage);
                       }
                        //seteaza propietatea in obiectul myHelpers pentru a da refresh atunci cand ajax=OK
                        this_obj.processAjaxOK=true;

                    }
                    else
                    {
                        divObj.style.backgroundColor="red";
                        divObj.style.border="1px solid black";
                        divObj.innerHTML=xmlHttpObject.responseText;
                        //divObj.innerHTML="Error at ajax request<br/>";
                        //seteaza propietatea in obiectul myHelpers pentru a da refresh atunci cand ajax=OK
                        this_obj.processAjaxOK=false;
                    }




                }

            };


        }else
        {
            alert("No xmlHttpObject");

        }


        switch(method)
        {

            case "GET":
                xmlHttpObject.open("GET",phpPage);
                /** EVITA REQUEST CACHE**/
                xmlHttpObject.setRequestHeader('If-Modified-Since', 'Sat, 03 Jan2010 00:00:00GMT');
                xmlHttpObject.send(null);
                break;

            case "POST":
                xmlHttpObject.open("POST",phpPage);
                xmlHttpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlHttpObject.send(params);
                break;

            default:
                alert("Sending error");

        }


    },

    processAjaxOK:null,
    ajaxMessage:null


};
