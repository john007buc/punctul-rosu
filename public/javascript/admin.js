window.onload=function(){


    /**** ADAUGA EVENT HANDLER PENTRU TABELUL CU INTREBARI ****/
    var tableId=document.getElementById("questions-table");
    for(var i=0;i<tableId.rows.length;i++)
    {
        myHelpers.addEvent(tableId.rows[i],"dblclick",questionDoubleClick);
    }

    /**** ADAUGA EVENT HANDLER PENTRU TABELUL CU CATEGORII ****/
    var tableCatId=document.getElementById("category-table");
    var rows=tableCatId.getElementsByTagName("TR");
    for(var i=1;i<rows.length;i++)
    {
        //myHelpers.addEvent(rows[i],"dblclick",categoryDoubleClick);
        myHelpers.addEvent(rows[i],"click",categoryClick);
    }


    //adauga click event handler pentru tagul select language
    var selectLanguage=document.getElementById("countries");
    myHelpers.addEvent(selectLanguage,"change",changeLanguage);

    var catTableRowId=localStorage.getItem("rowId");
    document.getElementById(catTableRowId).style.color="red";

};
function categoryDoubleClick($this,evt)
{
   var category=$this.children[0].innerHTML;
   var category_id=$this.getAttribute("id");
   var category_obj={
       category_id:category_id,
       category:category
   };

    categorie(evt,category_obj);

}
var alreadyClick=false;
function categoryClick(evt)
{

   var $this= this;
    if(alreadyClick)
    {
        alreadyClick=false;
        clearTimeout(clickTimeOut);
        categoryDoubleClick($this,evt);

    }
    else
    {
        alreadyClick=true;
         clickTimeOut=setTimeout(function(){
            alreadyClick=false;
            var category=$this.children[0].innerHTML;
            var language=document.getElementById("countries").options[document.getElementById("countries").selectedIndex].text;
            localStorage.clear();
            localStorage.rowId=$this.getAttribute("id");
            location=BASE_PATH+"ro/admin/categorii/"+language+"/"+category;

        },300);
    }


}
function changeLanguage(evt)
{
    var selectedValue=this.options[this.selectedIndex].text;

   location=BASE_PATH+"ro/admin/categorii/"+selectedValue;

}
function questionDoubleClick(evt)
{
   //alert (this.cells[0].firstChild.nodeValue);
    var question_data={
        selected_category:document.getElementById("current-category").innerHTML,
        question_id:this.getAttribute("id"),
        question:this.cells[0].firstChild.nodeValue,
        variants:this.cells[1].firstChild.nodeValue.split(","),
        points:this.cells[2].firstChild.nodeValue,
        discount:this.cells[3].firstChild.nodeValue
    };

   intrebare(evt,question_data);
}

function categorie(ev,category_obj)
{
    var page=document.getElementById("forms");
    page.innerHTML="";

    var positions=myHelpers.getMousePosition(ev);
    var posX=positions[0];
    var posY=positions[1];

   // POZITIONARE FORMULAR ADAUGARE

    page.style.visibility="visible";
    page.style.left=posX+"px";
    page.style.top=posY+"px";

    //CREARE ELEMENTE

    var messageDiv=document.createElement("div");
    messageDiv.setAttribute("id","messageDiv");
    page.appendChild(messageDiv);

    var theForm=document.createElement("form");
    theForm.style.display="inline";

    /***********************************************************/
    /******* Selecteaza limba afisata in select options ************/
    var selectObj=document.getElementById("countries");
    var selectedLanguage=selectObj.options[selectObj.selectedIndex].value;

    var theLanguage=document.createElement("input");
    theLanguage.type="hidden";
    theLanguage.name="language";
    theLanguage.value=selectedLanguage;
    theForm.appendChild(theLanguage);
    /**********************************************************************/
    //DACA ESTE PRIMIT OBIECTUL CU DATE, CREAZA UN HIDDEN INPUT PENTRU CATEGORY_ID

    if(category_obj && category_obj.category_id)
    {
        var theCategoryId=document.createElement("input");
        theCategoryId.type="hidden";
        theCategoryId.name="category_id";
        theCategoryId.value=category_obj.category_id;
        theForm.appendChild(theCategoryId);
    }

    /*********************************************************************/

    var txtBox=document.createElement("input");
    txtBox.type="text";
    txtBox.id="category";
    txtBox.name="category";
    txtBox.value=(category_obj && category_obj.category)?(category_obj.category):"";
    theForm.appendChild(txtBox);
    /*********************************************************************/
    var submitButton=document.createElement("input");
    submitButton.type="submit";
    submitButton.name="Submit";
    if(category_obj)
    {
        submitButton.value="Modifica";
        submitButton.onclick=function(event){
            myHelpers.prevDefault(event);
            var data=myHelpers.formSerialize(this.parentNode);
            myHelpers.processAjax("messageDiv","POST",BASE_PATH+"ro/ajax/update_category",data);

        };

    }else{
        submitButton.value="Salveaza";
        submitButton.onclick=function(event){
           myHelpers.prevDefault(event);
            if(txtBox.value!="")
            {
              var data=myHelpers.formSerialize(this.parentNode);
              myHelpers.processAjax("messageDiv","POST",BASE_PATH+"ro/ajax/add_category",data);
              txtBox.value="";
            }

        };
    }
    theForm.appendChild(submitButton);
    /*********************************************************************/
    var cancelButton=document.createElement("input");
    cancelButton.type="reset";
    cancelButton.type="Reset";
    cancelButton.value="Inchide";
    cancelButton.onclick=function(){

     hideForm(page);

     /*** In caz de success da refresh pe pagina***/
     if(myHelpers.processAjaxOK===true)
     {
        location.reload();
     }
    };

    theForm.appendChild(cancelButton);
    page.appendChild(theForm);

}

/******* end of categorie() ***********/

 function intrebare(evt,questionObj)
{

    var page=document.getElementById("forms");
    page.innerHTML="";

    var positions=myHelpers.getMousePosition(evt);
    var posX=positions[0];
    var posY=positions[1];

    // POZITIONARE FORMULAR ADAUGARE

    page.style.visibility="visible";
    page.style.left=posX+"px";
    page.style.top=posY+"px";

    //CREARE ELEMENTE

    var messageDiv=document.createElement("div");
    messageDiv.setAttribute("id","messageDiv");
    page.appendChild(messageDiv);

    var theForm=document.createElement("form");
    theForm.id="question-form";

    /***********************************************************/
    /******* Selecteaza limba afisata in select options ************/
    var selectObj=document.getElementById("countries");
    var selectedLanguage=selectObj.options[selectObj.selectedIndex].value;

    var theLanguage=document.createElement("input");
    theLanguage.type="hidden";
    theLanguage.name="language";
    theLanguage.value=selectedLanguage;
    theForm.appendChild(theLanguage);
    /**********************************************************/


    if(questionObj  && questionObj.question_id)
    {
        var questionId=document.createElement("input");
        questionId.type="hidden";
        questionId.name="question_id";
        questionId.value=questionObj.question_id;
        theForm.appendChild(questionId);

    }
    /**********************************************************/

    var theLabel=document.createElement("label");
    var textLabel=document.createTextNode("Selecteaza categoria: ");
    theLabel.appendChild(textLabel);
    theLabel.setAttribute("for","category");
    theForm.appendChild(theLabel);

    /******************SELECTEAZA CATEGORIA ***************************/
    var selected_category=(questionObj  && questionObj.selected_category)?questionObj.selected_category:"";
    var selectCategory=getSelectCategory("category-table",selected_category);


    selectCategory.setAttribute("name","category");
    theForm.appendChild(selectCategory);
    /**********************************************************/
     var theFieldSet=document.createElement("fieldset");
     var theLegend=document.createElement("legend");
     var legendText=document.createTextNode("Adauga intrebare");
     theLegend.appendChild(legendText);
     theFieldSet.appendChild(theLegend);
    /**********************************************************/
     var theTextArea=document.createElement("textarea");
     theTextArea.setAttribute("cols",20);
     theTextArea.setAttribute("rows",5);
     theTextArea.name="question";
     theTextArea.value=(questionObj && questionObj.question)?(questionObj.question):"";
     theFieldSet.appendChild(theTextArea);
     theForm.appendChild(theFieldSet);

    /**********************************************************/

    var theLabel=document.createElement("label");
    var textLabel=document.createTextNode("Punctaj: ");
    theLabel.appendChild(textLabel);
    theLabel.setAttribute("for","punctaj");
    theForm.appendChild(theLabel);

    /**********************************************************/

    var thePunctajTextBox=document.createElement("input");
    thePunctajTextBox.type="text";
    thePunctajTextBox.name="punctaj";
    thePunctajTextBox.style.width="40px";
    thePunctajTextBox.id="punctaj";
    thePunctajTextBox.value=(questionObj && questionObj.points)?(questionObj.points):"";
    theForm.appendChild(thePunctajTextBox);

    /**********************************************************/

    var theLabel=document.createElement("label");
    var textLabel=document.createTextNode(" Discount: ");
    theLabel.appendChild(textLabel);
    theLabel.setAttribute("for","discount");
    theForm.appendChild(theLabel);

    /**********************************************************/

    var theDiscountTextBox=document.createElement("input");
    theDiscountTextBox.type="text";
    theDiscountTextBox.name="discount";
    theDiscountTextBox.style.width="40px";
    theDiscountTextBox.id="discount";
    theDiscountTextBox.value=(questionObj && questionObj.discount)?(questionObj.discount):"";
    theForm.appendChild(theDiscountTextBox);

   /**********************************************************/

    var theA=document.createElement("a");
    theA.style.display="block";
    var textA=document.createTextNode("Click pentru a adauga o optiune");
    theA.appendChild(textA);
    theA.href="#";
    theA.onclick=function(event){
         myHelpers.prevDefault(event);
        var variant=generateVariantDiv();
        var btnsDiv=document.getElementById("div-buttons");
        theForm.insertBefore(variant,btnsDiv);
    };
    theForm.appendChild(theA);

    //VERIFICA DACA SUNT PRIMITE VARIANTE SI LE ADAUGA

    if(questionObj && questionObj.variants)
    {
        for(var i=0;i<questionObj.variants.length;i++)
        {
            var variant=generateVariantDiv();
            variant.getElementsByTagName("input")[0].value=questionObj.variants[i];
            theForm.appendChild( variant);
        }
    }

    /***************Butoane Submit si Reset*************************/

     var theDivButtons=document.createElement("div");
    theDivButtons.id="div-buttons";

    var theResetBtn=document.createElement("input");
    theResetBtn.type="reset";
    theResetBtn.value="Inchide";
    theResetBtn.name="Reset";
    theResetBtn.onclick=function(event){
        myHelpers.prevDefault();
        hideForm(page);
        /*** In caz de success da refresh pe pagina***/
        if(myHelpers.processAjaxOK===true)
        {
            location.reload();
        }
    };

    theDivButtons.appendChild(theResetBtn);

    var theSubmitBtn=document.createElement("input");
    theSubmitBtn.type="submit";
    theSubmitBtn.name="Submit";
    theSubmitBtn.id="submitBtn";
    theSubmitBtn.onclick=function(event){
        myHelpers.prevDefault();
        var data=myHelpers.formSerialize(this.form);
        myHelpers.processAjax("messageDiv","POST",BASE_PATH+"ro/ajax/question",data);
    };
    if(questionObj)
    {
        theSubmitBtn.value="Modifica";

    }else{

        theSubmitBtn.value="Salveaza";

    }


    theDivButtons.appendChild(theSubmitBtn);

    theForm.appendChild(theDivButtons);

    /**********************************************************/

     page.appendChild(theForm);
}

/******* end of intrebare() ***********/


function hideForm(pageObj)
{
    pageObj.innerHTML="";
    pageObj.style.visibility="hidden";
}

/******* end of hideForm(pageObj) ***********/

function generateVariantDiv()
{
    var theDiv=document.createElement("div");
    theDiv.className="variants";

    var theBox=document.createElement("input");
    theBox.type="text";
    theBox.name="variant[]";
    theDiv.appendChild(theBox);

    var theA=document.createElement("a");
    theA.href="#";
    theA.onclick=function(event){
      myHelpers.prevDefault(event);
      var target=myHelpers.getTarget(event);
      var parentDiv=target.parentNode;

        if (parentDiv.className!="variants")
        {
            parentDiv=target.parentNode.parentNode;
        }

        parentDiv.parentNode.removeChild(parentDiv);

    };

    var theDeleteImg=document.createElement("img");
    theDeleteImg.src=BASE_PATH+"images/delete.png";
    theA.appendChild(theDeleteImg);

    theDiv.appendChild(theA);

    return theDiv;

}

/******* end of generateVariantDiv() ***********/

function getSelectCategory(tableId,selectedCategory)
{
    var tableObj=document.getElementById(tableId);

    var theSelect=document.createElement("select");

    for(var i=1;i<tableObj.rows.length;i++)
    {
        var theOption=document.createElement("option");

        var category=tableObj.rows[i].cells[0].firstChild.nodeValue;
        // sau tableObj.rows[i].cells[0].innerHTML
        var textNode=document.createTextNode(category);
        theOption.setAttribute("value",category);
        theOption.appendChild(textNode);
        if(selectedCategory!="" && selectedCategory==category){
            theOption.setAttribute("selected","selected");
        }
        theSelect.appendChild(theOption);

    }

    return theSelect;

}

/******* end of getSelectCategory(tableId) ***********/

function deleteRow(event,tdObject,scope)
{
    event.stopPropagation();

    //alert(tdObject.tagName+"-----"+tdObject.parentNode.getAttribute("id").split("_")[1]);
   var response=confirm("Esti sigur ca vrei sa stergi aceasta inregistrare?");
    if(response==true){
       var id=tdObject.parentNode.getAttribute("id");
       myHelpers.processAjax("globalMessageDiv","POST",BASE_PATH+"ro/ajax/"+scope,"id="+id);
       var t=setTimeout(function(){location.reload(true);clearTimeout(t);},500);


    }
}



