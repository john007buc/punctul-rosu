function searchNews($this,event){

    // evt.preventDefault();

    if(event.keyCode==13 && $this.value.length>=3){
        $.ajax({
            url:BASE_PATH+LANGUAGE+"/ajax/search_news",
            type:'POST',
            data:"search_txt="+encodeURIComponent($this.value),
            success:function(responseText){
                $("#news-shell").html(responseText);
            }
        });
    }
}