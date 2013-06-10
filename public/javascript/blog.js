
window.onload=function(){
    if( localStorage.getItem("news_id"))
        localStorage.removeItem("news_id");



//adauga click event handler pentru tagul select language
    var selectLanguage=document.getElementById("countries");
    myHelpers.addEvent(selectLanguage,"change",changeLanguage);


 //selecteaza toate stirile si adauga un eveniment
 $("div.news").on('dblclick',function(){
     if ( editor )
        return;
     var news_id=$(this).attr("id");
     var divObj=$(this).get(0);
     if( localStorage.getItem("news_id")){
         localStorage.removeItem("news_id");
     }

     localStorage.setItem("news_id",news_id);


     $.ajax({url:BASE_PATH+"ro/ajax/get_one_news",
             method:"POST",
             data:"news_id="+news_id,
             success:function(result){
                     $('#'+news_id).html(result);
                    },
              complete:function(){

                                   if ( editor )
                                      editor.destroy();

                                   editor = CKEDITOR.replace(divObj,{
                                                       uiColor: '#9AB8F3',
                                                       extraPlugins:'ajaxsave,equation,placeholder'
                                                                        });


                                    }

     });

 });


};



function changeLanguage(evt)
{
    var selectedValue=this.options[this.selectedIndex].text;
    location=BASE_PATH+"ro/admin/news/"+selectedValue;

}

function saveEditorData(editorData)
{
    //selecteaza limba selectata in select box
    var language_id=document.getElementById("countries").options[document.getElementById("countries").selectedIndex].value;
    var language=document.getElementById("countries").options[document.getElementById("countries").selectedIndex].text;

    var news_id=localStorage.getItem("news_id");
    var scope=(news_id)?"update_news":"add_news";
    myHelpers.processAjax("messageDiv","POST",BASE_PATH+"ro/ajax/"+scope,"news_id="+news_id+"&language_id="+language_id+"&language="+language+"&article="+encodeURIComponent(editorData));

}
function delete_news(event,news_id)
{
    myHelpers.prevDefault(event);

    if(confirm("Esti sigur?"))
    {
       myHelpers.processAjax(null,"POST",BASE_PATH+"ro/ajax/delete_news","news_id="+news_id);
        var tOut=setTimeout(function(){
            alert(myHelpers.ajaxMessage);
            location.reload();
            clearTimeout(tOut);
        },500);

    }
    /*var tOut=setTimeout(function(){
        location.reload();
        clearTimeout(tOut);
    },500);*/



}

var editor, html = '<h2 style="text-align:center">[[Dublu click pentru a adauga titlul articolului]]</h2><p>Textul tau aici</p>';

function createEditor() {
    if ( editor )
        return;


    // Create a new editor inside the <div id="editor">, setting its value to html
    var config = {
        uiColor: '#9AB8F3',
        extraPlugins:'ajaxsave,equation,placeholder'
    };
    editor = CKEDITOR.appendTo( 'editor', config, html );
    //editor.innerHTML="Inner";

}

function removeEditor() {
    if ( !editor )
        return;
    if( localStorage.getItem("news_id"))
      localStorage.removeItem("news_id");
    //alert(editor.getData());
    // Destroy the editor.
    editor.destroy();
    editor = null;
    location.reload();
   /* var tOut=setTimeout(function(){
        location.reload();
        clearTimeout(tOut);
    },500);*/
}
