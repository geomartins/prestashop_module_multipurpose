{extends file='page.tpl'}

{block name="page_content_container"}
  
    <div class="container">
        <select name="cats" id="cats">
           <option value=""> {l s='- Select -' mod='multipurpose'}</option>
           {if isset($categories) && $categories}
                {foreach from=$categories item=cat}
                    <option value="{$cat['id_category']}"> {$cat['name']} </option>
                {/foreach}

           {/if}
        </select>
    
    </div>

    <div class="ajax_products">

    </div>
    

    <table id="producttable" class="table table-hover">
        <thead>
            <tr>
                <th> {l s='ID' mod='multipurpose'}</th>
                <th> {l s='PRODUCT NAME' mod='multipurpose'}</th>
            </tr>

            <tr>
              <td>Row 1 Data 1</td>
              <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </thead>
    </table>

  
{/block}