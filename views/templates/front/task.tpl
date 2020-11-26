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

  
{/block}