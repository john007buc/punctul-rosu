$(document).ready(function(){
/*(1)*******************Event handler pentru butoanele radio care selecteaza tipul calagtoriei*****/
$('.route_type').click(function(){
   var value=$(this).val();
    /********************Daca se selecteaza tipul "in oras" este adaugat elementul <select> cu roasele****/
    if(value==2 ){
        addCities();
    }else if($('.select-city-group').length){
        /**Daca se da click pe alt buton este sters elementul <select> cu orasele, daca acesta exista**/
        $('.select-city-group').remove();
    }
});
/*(/1)********************************************************************************************************/

/*(2)*******************Event handler pentru butoenele radio care selecteaza tipul userului (sofer sau pasager)***/
 $('.user_type').click(function(){
        var selected=$(this).val();

        if(selected=="passager"){
            /**Pentru pasageri se dezactiveaza elementul input[type="text"] asociat numarului de locuri**/
            $('#places').attr('disabled','disabled');
        }else
            $('#places').removeAttr('disabled');
    });
/*(/2)***********************************************************************************************************/

/*(3)********************************Setari pentru calendarul din forumularul de adaugare a calatoriei***********/
    $( "#datepicker1" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
/*(/3)*************************************************************************************************************/
});

/*(4)****************************************Functie care adauga elementul <select> cu orasele din tara******/
function addCities(selectedVal)
{
    if(!$('.select-city-group').length){
        $.getJSON(BASE_PATH+LANGUAGE+"/ajax/get_cities/"+LANGUAGE,function(jsonData){
            var options="";
            $.each(jsonData,function(k,v){
                if(selectedVal && selectedVal==v.city_id){
                    var selected="selected='selected'";
                }else{
                    selected="";
                }
                options+="<option value='"+v.city_id+"'"+selected+">"+v.city+"</option>";
            });
            var selectHtml="<select  class='select-city' name='city'>"+options+"</select>";
            var controlGroup="<div class='control-group select-city-group'><label class='control-label'></label><div class='controls'>"+selectHtml+"</div></div>";
            $('#select-type').after(controlGroup);
        });
    }
}
/*(/4)***************************************************************************************************************************************************************/