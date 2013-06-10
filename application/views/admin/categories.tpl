{extends file ="admin_layout.tpl"}
{block name="script"}
<script type="text/javascript" src="{$BASE_PATH}javascript/admin.js"></script>
{/block}
{block name="contents"}
<div id="globalMessageDiv"></div>
<div id="contents">
   <div id="buttons">Selecteaza tara: {html_options name=countries id=countries options=$countries selected=$selected_country}<button onclick="categorie(event)">Adauga categoire</button><button onclick="intrebare(event)">Adauga intrebare</button></div>
  <div id="clear"></div>
   <div id="categories-div">
       {if isset($categories)}
       <table id="category-table">
           <caption>Tabel Categorii</caption>
           <thead><tr><th>Categorie</th><th>Delete</th></tr></thead>
        {section name=cat loop=$categories}
        <tr class="{cycle values='odd,even'}"  id="{$categories[cat].category_id}">
            <td>{$categories[cat].category}</td>
            <td onclick="deleteRow(event,this,'delete_category')">Delete</td>
        </tr>
        {/section}

       </table>
       {/if}
   </div>
   <div id="quesitons-div">

     {if isset($questions)}
     <p><b>Teste din categoria <span id="current-category">{$selected_category}</span></b></p>
     <table id="questions-table">

         <thead><tr><th>Intrebare</th><th>Variante raspuns</th><th>Punctaj</th><th>Discount</th><th>Delete</th></tr></thead>
     {section name=q loop=$questions}
       <tr class="{cycle values='odd,even'}" id="q_{$questions[q].question_id}"><td>{$questions[q].question}</td><td>{$questions[q].variants}</td><td>{$questions[q].points}</td><td>{$questions[q].discount}</td><td onclick="deleteRow(event,this,'delete_question')">Delete</td></tr>
     {/section}
     
     {/if}
     </table>

   </div>



</div>
{/block}